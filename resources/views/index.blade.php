@extends('layouts.dashboard')
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-12">
        <div class="row align-items-center my-4">
          <div class="col">
            <h2 class="h3 mb-0 page-title">Albums</h2>
          </div>
          <div class="col-auto">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#varyModal" data-whatever="@mdo"><span class="fe fe-filter fe-12 mr-2"></span>Create</button>
          </div>
        </div>
        <div class="row">
            @foreach ($albums as $album)
              <div class="col-md-3">
            <div class="card shadow mb-4">
              <div class="card-body text-center">
                
                  <a href="{{route('albums.show',$album->id)}}">
                    <img src="{{'storage/'.$album->images[0]->path}}" width="100%" alt="..." class="avatar-img ">
                  </a>
                
              </div> <!-- ./card-text -->
              <div class="card-footer">
                <div class="row align-items-center justify-content-between">
                  <div class="col-auto">
                    <small>
                      <span class="dot dot-lg bg-success mr-1"></span> {{$album->name}} </small>
                  </div>
                  <div class="col-auto">
                    <div class="file-action">
                      <button type="button" class="btn btn-link dropdown-toggle more-vertical p-0 text-muted mx-auto" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="text-muted sr-only">Action</span>
                      </button>
                      <div class="dropdown-menu m-2">
                        <a class="dropdown-item" data-toggle="modal" data-target="#edit{{$album->id}}" data-whatever="@mdo"><i class="fe fe-meh fe-12 mr-4"></i>Edit</a>
            
                        <a class="dropdown-item" data-toggle="modal" data-target="#delete{{$album->id}}" data-whatever="@mdo"><i class="fe fe-delete fe-12 mr-4"></i>Delete</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div> <!-- /.card-footer -->
            </div>
          </div> <!-- .col -->
    
          <div class="modal fade" id="edit{{$album->id}}" tabindex="-1" role="dialog" aria-labelledby="varyModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="varyModalLabel">Edit Album</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form method="POST" action="{{route('albums.update',$album->id)}}">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                      <label for="recipient-name" class="col-form-label">Name:</label>
                      <input type="text" name="name" value="{{$album->name}}" class="form-control" id="recipient-name">
                    </div>
                    {{-- <div class="form-group">
                      <label for="message-text" class="col-form-label">Images:</label>
                      <input type="file" name="images[]" multiple class="form-control" id="recipient-name">
                    </div> --}}
                    <div class="modal-footer">
                        <button type="button" class="btn mb-2 btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn mb-2 btn-primary"> Submit</button>
                      </div>
                  </form>
                </div>
               
              </div>
            </div>
          </div>


          {{-- delete modal   --}}

          <div class="modal fade" id="delete{{$album->id}}" tabindex="-1" role="dialog" aria-labelledby="varyModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="varyModalLabel">Are you sure you want to delete Album at all or to move the pics to another album?</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form method="POST" action="{{route('albums.update',$album->id)}}">
                    @csrf
                    @method('DELETE')
                    
                    <div class="modal-footer">
                        <button type="button" class="btn mb-2 btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn mb-2 btn-primary"> Submit</button>
                      </div>
                  </form>
                </div>
               
              </div>
            </div>
          </div>


         
    
            @endforeach
          
          <div class="col-md-9">
          </div> <!-- .col -->
        </div> <!-- .row -->
       
      </div> <!-- .col-12 -->
    </div> <!-- .row -->
  </div>


  <div class="modal fade" id="varyModal" tabindex="-1" role="dialog" aria-labelledby="varyModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="varyModalLabel">New Album</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form method="POST" action="{{route('albums.store')}}">
            @csrf
            <div class="form-group">
              <label for="recipient-name" class="col-form-label">Name:</label>
              <input type="text" name="name" class="form-control" id="recipient-name">
            </div>
            {{-- <div class="form-group">
              <label for="message-text" class="col-form-label">Images:</label>
              <input type="file" name="images[]" multiple class="form-control" id="recipient-name">
            </div> --}}
            <div class="modal-footer">
                <button type="button" class="btn mb-2 btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn mb-2 btn-primary"> Submit</button>
              </div>
          </form>
        </div>
       
      </div>
    </div>
  </div>
@endsection