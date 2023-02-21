<?php
$aError=[];
$ok = true;
$aRespuestaMtoDepartamento = [
    'departamentos'=>null
];
if(!isset($_SESSION['paginacionDepartamento'])){
    $_SESSION['paginacionDepartamento']['paginaActual']=0;
}
if(!isset($_SESSION["criterioBusquedaDepartamento"])){
    $_SESSION["criterioBusquedaDepartamento"]=[
        'descripcion'=>"",
        'estado'=>1
    ];
}
try{
    if(isset($_REQUEST["boton"])){
        switch ($_REQUEST["boton"]) {
            case 'buscar':
                $_SESSION['paginacionDepartamento']['paginaActual']=0;
                $aRespuestaMtoDepartamento['departamentos']=DepartamentoPDO::bucarDepartamentoPorDescPagiado($_REQUEST['bdescripcion'],(int)$_REQUEST['estado']);
                $_SESSION['criterioBusquedaDepartamento']['descripcion']=$_REQUEST['bdescripcion'];
                $_SESSION['criterioBusquedaDepartamento']['estado']=(int)$_REQUEST['estado'];
                break;
            case 'add':
                $aError['codigo'] = validacionFormularios::comprobarAlfabetico($_REQUEST['acodigo'], 3, 3, 1);
                $aError['descripcion'] = validacionFormularios::comprobarAlfabetico($_REQUEST['adescripcion'], 255, 0, 1);
                $aError['volumennegocio'] = validacionFormularios::comprobarNumber($_REQUEST['avolumenNegocio'], 100000, 0, 1);
                foreach($aError as $error){
                    if(!empty($error)){
                        $ok = false;
                    }
                }
                if($ok){
                    DepartamentoPDO::altaDepartamento(new Departamento($_REQUEST['acodigo'],$_REQUEST['adescripcion'],time(),$_REQUEST['avolumenNegocio']));
                }
                break;
            case 'importar':
                if(!empty($_FILES['fileimport']['name'])){
                    DepartamentoPDO::importarDepartamentos($_FILES['fileimport']);
                }
                break;
            case 'exportar':
                DepartamentoPDO::exportarDepartamento();
                break;
            case 'volver':
                    $_SESSION['paginaAnterior'] = $_SESSION['paginaEnCurso'];
                    $_SESSION['paginaEnCurso'] = "inicioprivado";
                    header('Location: ./index.php');
                    exit;
        }
    }else{
        if(isset($_REQUEST['alta'])){
            DepartamentoPDO::rehabilitaDepartamento($_REQUEST['alta']);
        }else if(isset($_REQUEST['baja'])){
            DepartamentoPDO::bajaLogicaDepartamento($_REQUEST['baja']);
        }else if(isset($_REQUEST['editar'])){
            $_SESSION ['codDepartamentoEnCurso']=$_REQUEST['editar'];
            $aError['descripcion'] = validacionFormularios::comprobarAlfabetico($_REQUEST['mdescDepartamento'], 255, 0, 1);
            $aError['volumennegocio'] = validacionFormularios::comprobarNumber($_REQUEST['mvolumenNegocio'], 100000, 0, 1);
            foreach($aError as $error){
                if(!empty($error)){
                    $ok = false;
                }
            }
            if($ok){
                DepartamentoPDO::modificaDepartamento(new Departamento($_REQUEST['editar'],$_REQUEST['mdescDepartamento'],0,$_REQUEST['mvolumenNegocio']),$_REQUEST['editar']);
            }
        }else if(isset($_REQUEST['eliminar'])){
            $_SESSION ['codDepartamentoEnCurso']=$_REQUEST['eliminar'];
            $_SESSION['paginaAnterior'] = $_SESSION['paginaEnCurso'];
            $_SESSION['paginaEnCurso'] =  "eliminardepartamento";
            header('Location: ./index.php');
            exit;
        }
    }
    if(isset($_REQUEST['principio'])){
        $_SESSION['paginacionDepartamento']['paginaActual']=0;
    }
    if(isset($_REQUEST['anterior'])){
        if($_SESSION['paginacionDepartamento']['paginaActual']>0){
            $_SESSION['paginacionDepartamento']['paginaActual']-=1;
        }
    }
    if(isset($_REQUEST['siguiente'])){
        if($_SESSION['paginacionDepartamento']['paginaActual']<$_SESSION['paginacionDepartamento']['maximo']-1){
            $_SESSION['paginacionDepartamento']['paginaActual']+=1;
        }
    }
    if(isset($_REQUEST['ultima'])){
        $_SESSION['paginacionDepartamento']['paginaActual']=$_SESSION['paginacionDepartamento']['maximo']-1;
    }
    $aRespuestaMtoDepartamento['departamentos']=DepartamentoPDO::bucarDepartamentoPorDescPagiado($_SESSION['criterioBusquedaDepartamento']['descripcion'],$_SESSION['criterioBusquedaDepartamento']['estado']);
}catch(ErrorApp $errorAPP){
    $_SESSION['paginaEnCurso'] = "error";
    header('Location: ./index.php');
    exit();
}
require_once $aVista['layout'];