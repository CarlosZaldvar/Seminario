<?php

namespace Tests\Unit;

//use PHPUnit\Framework\TestCase;
use App\Models\Alumno;
use App\Http\Controllers\AlumnoController;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Tests\TestCase;

class AlumnoControllerUnitTest extends TestCase
{
    public function test_probar_validacion_falla_para_crear_Alumnos()
    {
        //variable para el controlador, aqui se crea la instancia de dicho controlador
        $controller= new AlumnoController();
        $request=Request::create('/alumnos','POST',[
            'name' => '',//Ingresando dato vacio para comprobar la validacion de require
            'apellido' => '',
            'email' => '',
            'edad' => ''
        ]);
        $this->expectException(ValidationException::class);
        // Se espera que falle la validación
        $controller->store($request);
    }

    public function test_probar_validacion_correcta_para_crear_Alumnos()
    {
        //variable para el controlador, aqui se crea la instancia de dicho controlador
        $controller= new AlumnoController();
        $request=Request::create('/alumnos','POST',[
            'name' => 'Kevin',//Ingresando dato vacio para comprobar la validacion de require
            'apellido' => 'Calix',
            'email' => 'kcalix@unicah.edu',
            'edad' => '20'
]);
    $this->expectException(ValidationException::class);
    // Se espera que falle la validación
    $controller->store($request);
    $this->assertTrue($response->isRedirect(route('alumnos.index')));
    }
}