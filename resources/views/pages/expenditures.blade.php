<style>
    .head{
        background-color: gainsboro;
        padding: 0px 20px 0px;
        border: 1px solid;
    }
</style>
@extends('layout.app')
@section('content') 

<div class="wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 ">
                <div>
                    @foreach ($errors as $error)
                    <div class="alert alert-danger">
                        {{$error}}
                    </div>
                    @endforeach
                    @if (session('success'))
                    <div class="alert alert-success" role="alert">
                      {{session('success')}}
                    </div>
                    @endif
                    @if (session('failed'))
                    <div class="alert alert-danger" role="alert">
                      {{session('failed')}}
                    </div>
                    @endif
                </div>
                <div class="head">
                    <h2>Expenditures</h2>
                </div>
                
                <div class="restable">
                    <div class="responsive-table-lg">
                        @if (count($expenditures)>0)
                        <table class="table text-center table-sm" >
                            <thead class="thead-dark">
                                <tr>
                                    <th>Amount Used(PHP)</th>
                                    <th>Purchased By</th>
                                    <th>Date Purchased</th>
                                    <th>Purchased item</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($expenditures as $item)
                                    <tr>
                                        <td>{{$item->exp_used_amount}}</td>
                                        <td>{{$item->purchased_by}}</td>
                                        <td>{{$item->date_purchased}}</td>
                                        <td>
                                            <a href="/expenditure_item/{{$item->exp_id}}" class="btn btn-sm btn-outline-primary">view</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @else
                            <h5>No Expenditures recorded!</h5>
                        @endif                   
                    </div>
                   
                </div>
                <div>
                    {{$expenditures->links()}}
                </div>
                <div>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
                        Register
                      </button>
                </div>
            </div>
        </div>
     </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Register new Expenses</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{url('/register_expenditure')}}" method="POST">
            {{ csrf_field() }}
            {{method_field('PUT')}}
            <div class="modal-body">
            <label>Amount Used(PHP)</label>
            <input type="number" name="amtused" class="form-control" >
            <label>Purchased By</label>
            <input type="text" name="purchased_by" class="form-control">
            <label>Date Purchased</label>
            <input type="date" name="date_purchased" id="dp" class="form-control">
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <input type="submit" value="Submit" class="btn btn-primary">
            </div>
        </form>
      </div>
    </div>
  </div>
  <script>
    //   document.getElementById('dp').value = moment().format('YYYY-MM-DD')
    document.getElementById('dp').valueAsDate = new Date();
  </script>
@endsection