<style>
    .head{
        background-color: gainsboro;
        padding: 0px 20px 0px;
        border: 1px solid;
    }
    input[type=number]::-webkit-inner-spin-button, 
input[type=number]::-webkit-outer-spin-button { 
  -webkit-appearance: none; 
  margin: 0; 
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
                    <h2>Items</h2>
                </div>
                
                <div class="restable">
                    <div class="responsive-table-lg">
                        <table class="table text-center table-sm" >
                            <thead class="thead-dark">
                                <tr>
                                    <th>Quantity</th>
                                    <th>Units</th>
                                    <th>item Name</th>
                                </tr>
                            </thead>
                            <tbody> 
                              @if (count($items)>0)
                                @foreach ($items as $item)
                                <tr>
                                <td>{{$item->item_quantity}}</td>
                                <td>{{$item->item_unit}}</td>
                                <td>{{$item->item_name}}</td>
                                </tr>
                                @endforeach
                              @else
                              <h5>No Items recorded!</h5>
                              @endif 
                            </tbody>
                        </table>
                                          
                    </div>
                   
                </div>
                <div>
                  <a href="/expenditures" class="btn btn-danger">Return</a>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#additemmodal">
                        Add Item
                      </button>
                    
                </div>
            </div>
        </div>
     </div>
</div>

<!-- Modal -->
<div class="modal fade" id="additemmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Item</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{url('/exp_add_item')}}" method="POST">
            {{ csrf_field() }}
            {{method_field('PUT')}}
        <div class="modal-body">
            <input type="hidden" name="exp_id" value="{{$exp_id}}">
                <div class="form-row">
                  <div class="col-2">
                      <label>Quantity</label>
                    <input type="number" name="qty" class="form-control" required>
                  </div>
                  <div class="col-2">
                    <label for="exampleFormControlSelect1">Unit</label>
                    <select class="form-control" name="unit" id="exampleFormControlSelect1">
                      <option>pc/s</option>
                      <option>kl/s</option>
                      <option>sack/s</option>
                    </select>
                  </div>
                  <div class="col-8">
                    <label>Item Name</label>
                    <input type="text" name="item_name" class="form-control" required>
                </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <input type="submit" value="Submit" class="btn btn-primary">
            </div>
        </form>
      </div>
    </div>
  </div>


@endsection