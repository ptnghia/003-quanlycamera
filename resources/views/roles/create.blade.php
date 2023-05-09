@extends('main')

@section('css')
<link href="{{asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet" />
<link href="{{asset('assets/plugins/select2/css/select2-bootstrap4.css')}}" rel="stylesheet" />
@endsection

@section('content')
<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Nhóm người dùng</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;">
                        <i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item" aria-current="page">Quản trị chung</li>
                    <li class="breadcrumb-item active" aria-current="page">Nhóm người dùng</li>
                </ol>
            </nav>
        </div>
    </div>
    <!--end breadcrumb-->
    <div class="row justify-content-center">
        
        <div class="col-lg-6 col-12">
            <div class="card border-top border-0 border-4 border-primary">
                <div class="card-body p-5 pt-3">
        
                    {!! Form::open(array('route' => 'roles.store','method'=>'POST')) !!}
                    <div class="form-horizontal">
                        <div class="form-group">
                            @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong> There were some problems with your input.<br>
                                <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                                </ul>
                            </div>
                            @endif
                        </div>
                        <div class="form-group row">
                            <label for="inputName" class="col-md-2 col-form-label">Tên nhóm</label>
                            <div class="col-md-10">
                                {!! Form::text('name', null, array('placeholder' => 'Nhập tên nhóm','class' => 'form-control')) !!}
                        
                            </div>
                        </div>
                        <hr>
                        <div class="mb-3">
                            <div class="row">                            
                                <?php 
                                    $abc ="";
                                    $len = count($permission);     
                                ?>
                                @foreach($permission as $key => $value)
                                
                                    <?php 
                                    
                                        if ($key === 0) {
                                            echo '<div class="col-lg-4">';
                                        }                                
                                        
                                        if ($abc != substr($value->display_name,0,strpos($value->display_name,"_")) && $key === 0){
                                            $abc = substr($value->display_name,0,strpos($value->display_name,"_"));
                                            
                                            echo '<label class="form-label">'.$abc. '</label><div class="block">';

                                        }  else if($abc != substr($value->display_name,0,strpos($value->display_name,"_")) && $key !== 0){
                                            $abc = substr($value->display_name,0,strpos($value->display_name,"_"));
                                            echo '</div></div><div class="col-lg-4">';
                                            echo '<label>'.$abc. '</label><div class="block">';
                                        }  
                                            
                                    ?>
                                    <div class="form-check">
                                        {{ Form::checkbox('permission[]', $value->id, false, array('class="form-check-input"' => 'name')) }}
                                        <label class="form-check-label">{{ explode("_", $value->display_name)[1];  }}</label>
                                    </div>
                                    <?php
                                        if ($key === $len-1) {
                                            echo '</div></div>';
                                        }
                                    ?>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>  
                    {!! Form::close() !!}
                </div>
            </div>
            
        </div>
    </div>
</div>

@endsection

@section('js')

<script src="{{asset('assets/plugins/select2/js/select2.min.js')}}"></script>
<script>
    $('.select2').select2({
        theme: 'bootstrap4',
        width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
        placeholder: $(this).data('placeholder'),
        allowClear: Boolean($(this).data('allow-clear')),
    });
    $('.multiple-select2').select2({
        theme: 'bootstrap4',
        width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
        placeholder: $(this).data('placeholder'),
        allowClear: Boolean($(this).data('allow-clear')),
    });
</script>
@endsection