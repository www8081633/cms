@extends('admin::layouts.master')
@section('content')
    @component('components.tabs',['title'=>'栏目管理'])
        @slot('nav')
            <li class="nav-item"><a href="#" class="nav-link active">栏目列表</a> </li>
            <li class="nav-item"><a href="/article/category/create" class="nav-link " >添加栏目</a> </li>
        @endslot
        @slot('body')
            <table class="table table-nowrap">
                <thead>
                <tr>
                    <th scope="col">编号</th>
                    <th scope="col">栏目名称</th>
                    <th scope="col">创建时间</th>
                    <th scope="col">修改时间</th>
                    <th scope="col">操作</th>
                </tr>
                </thead>
                <tbody>
                @foreach($categories as $category)
                <tr>
                    <td>{{$category['id']}}</td>
                    <td>{!! $category['_name'] !!}</td>
                    <td>{{$category['created_at']}}</td>
                    <td>{{$category['updated_at']}}</td>
                    <td>
                        <div class="btn-group btn-space">
                            <a href="/article/category/{{$category['id']}}/edit"  class="btn btn-light">编辑</a>
                            <button type="button"  onclick="delRole({{$category['id']}},this)" class="btn btn-danger">删除</button>
                            <form action="/article/category/{{$category['id']}}" method="post">
                                @csrf
                                @method('DELETE')
                            </form>
                        </div>
                    </td>
                </tr>
                    @endforeach
                </tbody>
            </table>
        @endslot
    @endcomponent
@endsection
@section('scripts')
    <script>
        function delRole(id,bt){
            if(confirm('确定删除栏目吗？')){
                $(bt).next('form').trigger('submit');
            }
        }
    </script>
@endsection


