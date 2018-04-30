@extends($configs['view'].'.app')
@section('title_page', 
	trans('admin.title_page', [ 
		'attr1' => 'Module', 
		'attr2' => trans('admin.add')]
	)
)
@section('content')
	<div id="page-wrapper">
		@include(
			$configs['view']. '.includes.boxs.title_page', 
			['title_page' => trans('admin.title_page', [ 
										'attr1' => 'Module', 
										'attr2' => trans('admin.add')]
									)]
		)
		<div class="row">
			<div class="col-md-4">
				<div class="panel panel-primary">
					<div class="panel-heading">
						@lang('admin.add') Module
					</div>

					
					<div class="panel-body">
						<form method="post" enctype="multipart/form-data">
							{!! csrf_field() !!}
							<div class="form-group">
								@if(Session::has('message'))
									<p class="alert {!! Session::get('alert-class') !!}">{!! Session::get('message') !!}</p>
								@endif
							</div>
							<div class="form-group">
								<span class="required">@lang('form.required_rule')</span>
							</div>
							<div class="form-group {!! $errors->has('module_name') ? 'has-error' : '' !!}">
	                            <label>@lang('form.title') <span class="required">(*)</span></label>
	                            <input type="text" name="module_name"  class="form-control title-generate-slug">
	                            <p class="error">{!! $errors->first('module_name') !!}</p>
	                            <p class="help-block"></p>
	                        </div>
	                        <div class="form-group {!! $errors->has('module_key') ? 'has-error' : '' !!}">
	                            <label>@lang('form.key') <span class="required">(*)</span></label>
	                            <input type="text" name="module_key"  class="form-control">
	                            <p class="error">{!! $errors->first('module_key') !!}</p>
	                            <p class="help-block"></p>
	                        </div>
	                        <div class="form-group">
	                            <label>@lang('form.slug')</label>
	                            <input type="text" name="slug"  class="form-control slug-get-title" readonly="">
	                            <p class="help-block"></p>
	                        </div>
	                        <div class="form-group text-right">
	                        	<button class="btn btn-primary">@lang('form.btn_add')</button>
	                        </div>
						</form>
					</div>
				</div>
			</div>

			<div class="col-md-8">
				<table class="table">
					<thead>
						<th>Stt</th>
						@foreach($columns as $key => $value)
							<th>{!! trans($configs['module'] .'.'. $value) !!}</th>
						@endforeach
					</thead>
					@if(sizeof($items) > 0 )
						@foreach($items as $key => $item)
							@php
								$item = $item->toArray();
							@endphp
							<tr>
								<td>{!! $key !!}</td>
								@foreach($columns as $key => $value)
									<td>{!! $item[$value] !!}</td>
								@endforeach
							</tr>
						@endforeach
					@else
						<tr>
							<td colspan="{!! sizeof($columns) + 1 !!}" class="text-center">@lang('notify.no_data')</td>
						</tr>
					@endif
				</table>
			</div>
		</div>
	</div>
@endsection

@push('css')
@endpush

@push('js')
@endpush