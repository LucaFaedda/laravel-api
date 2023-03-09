
@extends('layouts.admin')
@section('content')

    <div class="container">
        <div class="row p-5">
            <div class="col-12">
                <form action="{{route('admin.projects.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group ">
                                    @if($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error )
                                                <li>{{$error}}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    @endif
                                    <div class="col-8">
                                        @error('title')
                                            <p class="text-danger fw-bold">{{$message}}</p>
                                        @enderror
                                        <label class="control-label mb-2 fw-bold ">Titolo</label>
                                        <input type="text" name="title" class="form-control" placeholder="Inserisci il titolo">
                                    </div>
                                    <div class="col-8">
                                        @error('cover_image')
                                            <p class="text-danger fw-bold">{{$message}}</p>
                                        @enderror
                                        <label class="control-label my-2 fw-bold ">Immagine</label>
                                        <input type="file" name="cover_image" class="form-control">
                                    </div>
                                    <div class="col-3">
                                        <label class="control-label my-2 fw-bold ">Data del progetto</label>
                                        <input type="date" name="data_progetto"class="form-control"  placeholder="Data del progetto"></input>
                                    </div>
                                    <div class="col-5">
                                        @error('difficoltà')
                                            <p class="text-danger  fw-bold">{{$message}}</p>
                                         @enderror
                                        <label class="control-label  my-2 fw-bold">Difficoltà</label>
                                        <input type="number" name="difficoltà" class="form-control"  min="0" max="10">
                                    </div>
                                    <div class="col-5">
                                        <label class="control-label my-2 fw-bold">Tipo</label>
                                        <select class="form-control" name="types_id" id="types_id">
                                            @foreach ($types as $type )
                                                <option value="{{$type->id}}">{{$type->name}}</option> 
                                            @endforeach

                                        </select>

                                    </div>
                                    <div class="f d-flex flex-column">
                                        <label class="control-label my-2 fw-bold">Technologys</label>
                                        <div class="d-flex flex-column">

                                        </div>
                                        @foreach ($technologys as $item )
                                        <div>

                                            <input type="checkbox" value="{{$item->id}}" name="technology[]">
                                            <label class="form-check-label">{{$item->name}}</label>
                                        </div>
                                            
                                        @endforeach
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 mt-3">
                                <label class="control-label my-2 fw-bold ">Descrizione progetto</label>
                                <textarea class="form-control" name="descrizione" placeholder="Inserisci la descrizione"></textarea>

                            </div>
                        </div>
                        <div class="row my-5">
                            <div class="col-3">
                                <button type="submit" class="form-control btn btn-primary">
                                    Salva nuovo Progetto
                                </button>
                            </div>
                        </div>
        
                </form>
            </div>
        </div>
    </div>
</div>

</div>
@endsection

