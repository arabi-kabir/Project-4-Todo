@extends('Home.master')

@section('todolist')
    active
@endsection

@section('content')
    <div class="row">
        <div class="col-2">
            <div id="msg"></div>
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#createModal">
                <i class="fas fa-plus-circle"></i>
                Add New Todo
            </button>
            <!-- Add Todo Button/Modal -->
            <div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New Todo</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <form method="POST" action="{{route('addtodo')}}">
                      @csrf
                      <div class="modal-body">
                          <div class="form-group row">
                            <label class="col-sm-4 col-form-label float-right text-center">Todo Name</label>
                            <div class="col-sm-7">
                              <input type="text" class="form-control" name="todo_name" id="todo_name" placeholder="Todo Name">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label class="col-sm-4 col-form-label text-center">Priority</label>
                            <div class="col-sm-7">
                                <select class="form-control" name="priority" id="priority">
                                    <option value="Low">Low</option>
                                    <option value="Medium">Medium</option>
                                    <option value="High">High</option>
                                </select>
                            </div>
                          </div>
                          <div class="form-group row">
                            <label class="col-sm-4 col-form-label text-center" style="line-height: 98px;">Description</label>
                            <div class="col-sm-7">
                              <textarea class="form-control" rows="4" placeholder="Description" id="description" name="description"></textarea>
                            </div>
                          </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" id="add" class="btn btn-primary">Add Todo</button>
                      </div>
                  </form>
                </div>
              </div>
            </div>

        </div>
        <h2 class="col-9 text-center">Todo</h2>
    </div>

    @include('Include.alert_message')
    <div class="">
        <table class="table table-sm table-striped table-bordered table-dark">
          <thead>
            <tr>
              <th scope="col" class="text-center">#</th>
              <th scope="col" class="text-center">Todo Name</th>
              <th scope="col" class="text-center">Priority</th>
              <th scope="col" class="text-center">Created At</th>
              <th scope="col" class="text-center">Status</th>
              <th scope="col" class="text-center">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($todos as $key => $todo)
                <tr class="todo{{$todo->id}}">
                  <th scope="row" class="text-center">{{++$key}}</th>
                  <td class="text-center">{{$todo->todo_name}}</td>
                  <td class="text-center">{{$todo->priority}}</td>
                  <td class="text-center">{{$todo->creation_Time}}</td>
                  <td class="text-center">{{$todo->status}}</td>
                  <td class="text-center" id="action-col">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#viewModal{{$key}}">
                      <i class="fas fa-eye"></i>
                    </button>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#updateModal{{$key}}">
                      <i class="fas fa-wrench"></i>
                    </button>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#completeModal{{$key}}">
                      <i class="fas fa-check-double"></i>
                    </button>
                    <!-- View -->
                    <div class="modal fade" id="viewModal{{$key}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="modal-label">Todo - {{$todo->todo_name}}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body" id="view-todo">
                              <div class="form-group row">
                                <label class="col-sm-4 col-form-label float-right text-center">Todo Name</label>
                                <div class="col-sm-7">
                                  <input type="text" class="form-control" value="{{$todo->todo_name}}" disabled placeholder="Todo Name">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label class="col-sm-4 col-form-label text-center">Priority</label>
                                <div class="col-sm-7">
                                  <input type="text" class="form-control" value="{{$todo->priority}}" disabled placeholder="Priority">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label class="col-sm-4 col-form-label text-center">Creation Time</label>
                                <div class="col-sm-7">
                                  <input type="text" class="form-control" value="{{$todo->creation_Time}}" disabled placeholder="Priority">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label class="col-sm-4 col-form-label text-center">Status</label>
                                <div class="col-sm-7">
                                  <input type="text" class="form-control" value="{{$todo->status}}" disabled placeholder="Priority">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label class="col-sm-4 col-form-label text-center" style="line-height: 98px;">Description</label>
                                <div class="col-sm-7">
                                  <textarea class="form-control" rows="4" disabled placeholder="Description">{{$todo->description}}</textarea>
                                </div>
                              </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          </div>
                        </div>
                      </div>
                    </div>

                    <!-- Update -->
                    <div class="modal fade" id="updateModal{{$key}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Update Todo - <b>{{$todo->todo_name}}</b> </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <form action="/update-todo" method="POST">
                              @csrf
                              <input type="hidden" name="todo_id" value="{{$todo->id}}">
                              <div class="modal-body">
                                  <div class="form-group row">
                                    <label class="col-sm-4 col-form-label float-right text-center">Todo Name</label>
                                    <div class="col-sm-7">
                                      <input type="text" class="form-control" value="{{$todo->todo_name}}" name="todo_name" placeholder="Todo Name">
                                    </div>
                                  </div>
                                  <div class="form-group row">
                                    <label class="col-sm-4 col-form-label text-center">Priority</label>
                                    <div class="col-sm-7">
                                        <select class="form-control" name="priority">
                                            <option value="Low" <?php if($todo->priority=="Low") echo "selected"; ?> >Low</option>
                                            <option value="Medium" <?php if($todo->priority=="Medium") echo "selected"; ?> >Medium</option>
                                            <option value="High" <?php if($todo->priority=="High") echo "selected"; ?> >High</option>
                                        </select>
                                    </div>
                                  </div>
                                  <div class="form-group row">
                                    <label class="col-sm-4 col-form-label text-center">Status</label>
                                    <div class="col-sm-7">
                                      <input type="text" class="form-control" value="{{$todo->status}}" disabled placeholder="Priority">
                                    </div>
                                  </div>
                                  <div class="form-group row">
                                    <label class="col-sm-4 col-form-label text-center" style="line-height: 98px;">Description</label>
                                    <div class="col-sm-7">
                                      <textarea class="form-control" name="discription" rows="4" placeholder="Description">{{$todo->description}}</textarea>
                                    </div>
                                  </div>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Update changes</button>
                              </div>
                          </form>
                        </div>
                      </div>
                    </div>

                    <!-- Complete -->
                    <div class="modal fade" id="completeModal{{$key}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Conformation</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <p>Are you sure that you have completed <b>Todo - {{$todo->todo_name}}</b> ? </p>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <form action="{{route('setComplete')}}" method="POST">
                                @csrf
                                <input type="hidden" name="todo_id" value="{{$todo->id}}">
                                <button type="submit" class="btn btn-primary">Yes Set Completed</button>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>


                  </td>
                </tr>
            @endforeach
          </tbody>
        </table>
        {{ $todos->links() }}
    </div>
@endsection
