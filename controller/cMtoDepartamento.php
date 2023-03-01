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
                $aRespuestaMtoDepartamento['departamentos']=DepartamentoPDO::bucarDepartamentoPorDescPagiado($_REQUEST['bdescripcion'],(int)$_REQUEST['estado']);
                $_SESSION['criterioBusquedaDepartamento']['descripcion']=$_REQUEST['bdescripcion'];
                $_SESSION['criterioBusquedaDepartamento']['estado']=(int)$_REQUEST['estado'];
                break;
            case 'add':
                cambiarPagina("añadirdepartamento");
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
                cambiarPagina("inicioprivado");
        }
    }else{
        if(isset($_REQUEST['alta'])){
            DepartamentoPDO::rehabilitaDepartamento($_REQUEST['alta']);
        }else if(isset($_REQUEST['baja'])){
            DepartamentoPDO::bajaLogicaDepartamento($_REQUEST['baja']);
        }else if(isset($_REQUEST['editar'])){
            $_SESSION ['codDepartamentoEnCurso']=$_REQUEST['editar'];
            cambiarPagina("modificardepartamento");
        }else if(isset($_REQUEST['eliminar'])){
            $_SESSION ['codDepartamentoEnCurso']=$_REQUEST['eliminar'];
            cambiarPagina("eliminardepartamento");
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
    $aRespuesta=DepartamentoPDO::bucarDepartamentoPorDescPagiado($_SESSION['criterioBusquedaDepartamento']['descripcion'],$_SESSION['criterioBusquedaDepartamento']['estado']);
    $aRespuestaMtoDepartamento['departamentos']=(is_array($aRespuesta))?objetosArrays($aRespuesta):$aRespuesta;
}catch(ErrorApp $errorAPP){
    $_SESSION['paginaEnCurso'] = "error";
    header('Location: ./index.php');
    exit();
}

require_once $aVista['layout'];