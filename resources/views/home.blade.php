<x-app>

      <div class="container-fluid">
            <section>
                  <div class="container">
                        <div class="row">
                              <h1 class="text-center my-5">Workers</h1>
                              @if(session()->has('success'))
                                    <div class="alert alert-success">
                                          {{ session()->get('success') }}
                                    </div>
                              @endif
                              @if(session()->has('danger'))
                                    <div class="alert alert-danger">
                                          {{ session()->get('danger') }}
                                    </div>
                              @endif
                              <div class="col-12 my-2">
                                    <a href="{{ route('workers.create') }}"><button class="btn btn-primary">Create new data</button></a>
                              </div>
                              <div class="col-12">
                                    <table class="table">
                                          <thead>
                                                <tr>
                                                      <th scope="col">#</th>
                                                      <th scope="col">Name</th>
                                                      <th scope="col">Age</th>
                                                      <th scope="col">Pekerjaan</th>
                                                      <th scope="col">...</th>
                                                </tr>
                                          </thead>
                                          <tbody>
                                                @foreach ($workers as $index => $worker)
                                                      <tr class="align-middle">
                                                            <th scope="row">{{ $index + 1 }}</th>
                                                            <td>{{ $worker->user->name }}</td>
                                                            <td>{{ $worker->user->age }}</td>
                                                            <td>{{ $worker->job->name }}</td>
                                                            <td class="dropdown dropend">
                                                                  <button class="btn btn-secondary" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                                        <i class="bi bi-info-circle-fill"></i>
                                                                  </button>
                                                                  <ul class="dropdown-menu">
                                                                        <li><a class="dropdown-item" href="{{ route('workers.edit', $worker) }}" type="submit">Update</a></li>
                                                                        <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#deleteConfirmation">Delete</a></li>
                                                                        <!-- Modal -->
                                                                        
                                                                  </ul>
                                                                  <div class="modal fade" id="deleteConfirmation" tabindex="-1" aria-labelledby="deleteConfirmationLabel" aria-hidden="true">
                                                                              <div class="modal-dialog">
                                                                                    <div class="modal-content">
                                                                                          <div class="modal-body text-center">
                                                                                                <i class="bi bi-exclamation-circle-fill text-danger" style="font-size:30px"></i>
                                                                                                <div class="modal-title fs-5">
                                                                                                      Are you sure want to delete this worker?
                                                                                                </div>
                                                                                          </div>
                                                                                          <div class="modal-footer">
                                                                                                <form action="{{ route('workers.destroy', $worker) }}" method="POST">
                                                                                                      @csrf
                                                                                                      @method('DELETE')
                                                                                                      <button type="submit" class="btn btn-danger">Yes</button>
                                                                                                </form>
                                                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                                                                                          </div>
                                                                                    </div>
                                                                              </div>
                                                                  </div>
                                                            </td>
                                                      </tr>
                                                @endforeach
                                          </tbody>
                                    </table>
                              </div>
                        </div>
                  </div>
            </section>
      </div>



      {{-- <div class="container-fluid">
            <section>
                  <div class="container">
                        <div class="row">
                              <div class="col">
                                    <table class="table">
                                          <thead>
                                                <tr>
                                                      <th scope="col">no</th>
                                                      <th scope="col">nama</th>
                                                      <th scope="col">umur</th>
                                                      <th scope="col" class="text-center">Method</th>
                                                </tr>
                                          </thead>
                                          <tbody>
                                                <tr class="align-middle">
                                                      <th scope="row">1</th>
                                                      <td>Mark</td>
                                                      <td>12</td>
                                                      <td class="dropdown text-center dropend">
                                                            <button class="btn btn-danger" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                                  <i class="bi bi-info-circle-fill"></i>
                                                            </button>
                                                            <ul class="dropdown-menu">
                                                                  <li><a class="dropdown-item" href="@route('user.index')" type="submit">Update</a></li>
                                                                  <form action=" @route('user.view') " method="get">
                                                                        @csrf
                                                                        <li><a class="dropdown-item" href="#" type="submit">Delete</a></li>
                                                                  </form>
                                                            </ul>
                                                      </td>
                                                </tr>
                                          </tbody>
                                    </table>
                              </div>
                        </div>
                  </div>
            </section>
      </div> --}}

</x-app>