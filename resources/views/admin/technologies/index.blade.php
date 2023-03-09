@extends('layouts.admin')
@section('content')
<div class="container ">
      <div class="row mt-5">
          <div class="col-12 ">
              @if(session('message'))
            <div class="alert alert-success">
              @endif{{session('message')}}
            </div>
                <h2 class="text-center txt-personale">Lista progetti</h2>
                <table class="table  table-striped">
                    <thead>
                      <tr>
                        <th class="fw-bold">Id</th>
                        <th class="fw-bold">Nome</th>
                        <th class="fw-bold">Azioni</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($technologys as $item)
                        <tr>
                            <td>{{$item->id}}</td>
                            <td>{{$item->name}}</td>
                            <td><a href="" class="btn btn-sm" title="Maggiori Informazioni"><i class="fa-solid fa-circle-info"></i></a></td>
                            <td><a href="" class="btn btn-sm" title="Modifica"><i class="fa-regular fa-pen-to-square"></i></a></td>
                            <td>
                              <form action="" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm confirm-delete-button" title="Elimina" type="submit"><i class="fa-solid fa-recycle"></i></button> 
                                {{-- ricordarsi SEMPRE submit --}}
                              </form>
                          </td>
                        </tr>
                        @endforeach
                    
                    </tbody>
                </table>
              </div>
              <div class="col-3">
                
                <a class="btn btn-success my-3" href="">Aggiungi Elemento</a>
          </div>
      </div>
      @include('admin.partials.modal_delete')
</div>
@endsection