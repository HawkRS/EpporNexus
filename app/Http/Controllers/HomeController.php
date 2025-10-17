<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Models\Productos;
use App\Mail\Contact;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    private $f = 'public.';

    public function __construct()
    {
        //$this->middleware('web');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
      //dd('hola');
      return view($this->f.'index');
    }
    public function agropecuario()
    {
      //dd('hola');
      return view($this->f.'agropecuario');
    }
    public function industrial()
    {
      //dd('hola');
      return view($this->f.'industrial');
    }
    public function cocina()
    {
      //dd('hola');
      return view($this->f.'cocina');
    }
    public function mobiliario()
    {
      //dd('hola');
      return view($this->f.'urbano');
    }
    public function implementos()
    {
      //dd('hola');
      $productos = Productos::where('categoria', 1)->get();
      return view($this->f.'agropecuario.implementos', compact('productos'));
    }
    public function comederos()
    {
      //dd('hola');
      $productos = Productos::where('categoria', 2)->get();
      //dd($productos);
      return view($this->f.'agropecuario.comederos', compact('productos'));
    }
    public function jaulas()
    {
      $productos = Productos::where('categoria', 3)->get();
      return view($this->f.'agropecuario.jaulas', compact('productos'));
    }
    public function aviso()
    {
      //dd('hola');
      return view($this->f.'aviso');
    }
    public function mallas()
    {
      //dd('hola');
      return view($this->f.'agropecuario.mallas');
    }
    public function slats()
    {
      //dd('hola');
      return view($this->f.'agropecuario.slats');
    }

    public function ContactoSend(Request $request)
    {
      //dd($request->all());
      $objDemo = new \stdClass();
      $objDemo->name = $request->nombre;
      $objDemo->mail = $request->correo;
      $objDemo->phone = $request->numero;
      $objDemo->message = $request->mensaje;

      Mail::to("ing.carlosglezhdez@hotmail.com")->send(new Contact($objDemo));
      //Mail::to("contacto@eppor.mx")->send(new Contacto($objDemo));

      return redirect()->back()->with('message', 'Hemos recibido tus datos y nos pondremos en contacto a la brevedad');
    }
}
