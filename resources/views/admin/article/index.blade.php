@extends('admin.master')
@section('title')
{{ trans('admin.article') }}
@stop
@section('content')
@if (session('status'))
<script>
    $.jGrowl('{{ session('status') }}', { sticky: true, theme: 'growl-success', header: '{{ trans("admin.success") }}!' });
</script>
@endif
<h5 class="widget-name"><i class="icon-align-justify"></i>@yield('title')</h5>
<div class="widget">
    <div class="navbar">
        <div class="navbar-inner">
            <h6></h6>
            <div class="form-actions align-right">
                <a href="{{ url('admin/article/create') }}" data-placement="right" class="btn tip" data-original-title=""><i class="icon-plus"></i> &nbsp; {{ trans('admin.addarticle') }}</a>
            </div>
        </div>
    </div>
    <div class="table-overflow">
        <table class="table table-striped table-bordered" id="data-table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>{{ trans('admin.countrylang') }}</th>
                    <th>{{ trans('admin.title') }}</th>
                    <th>{{ trans('admin.descriptions') }}</th>
                    <th>{{ trans('admin.image') }}</th>
                    <th>{{ trans('admin.option') }}</th>
                </tr>
            </thead>
            <tbody>
                <?php $no=1; ?>
                @foreach ($article as  $r)

                <tr>
                    <td>
                        <?php echo $no; $no++; ?>
                    </td>
                    <td>{{ $r->countrylang->lang }}</td>
                    <td>{{ $r->title }}</td>
                    <td>{{ $r->text }}</td>
                    <td>
                        @if ($r->img==''||$r->img=='no_image.png')
                        <img src="{{ url('/public/images/no_image.png')  }}" width="50" height="50">
                        @else
                        <img src="{{ url('/public/images/article/thumb_'.$r->img)  }}" width="50" height="50">
                        @endif
                    </td>
                    <td>
                        <p class="item-buttons">
                            <a href="{{ url('/admin/article/'.$r->id.'/edit') }}" class="btn btn-info tip" title="{{ trans('admin.editthisarticle') }}" data-original-title="{{ trans('admin.editthisarticle') }}"><i class="icon-pencil"></i></a>
                            <a href="{{ url('/admin/article/'.$r->id.'/destroy') }}" class="btn btn-danger tip" title="{{ trans('admin.deletethisarticle') }}" data-original-title="{{ trans('admin.deletethisarticle') }}"><i class="icon-trash"></i></a>
                        </p>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@stop