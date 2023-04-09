<x-app>

      <div class="container-fluid">
            <section>
                  <div class="container">
                        <div class="row">
                              <div class="col">
                                    <h1 class="text-center my-5">Create Worker</h1>
                                    <form action="{{ route('workers.store') }}" method="POST" enctype="multipart/form-data">
                                          @csrf
                                          <div class="mb-3">
                                            <label for="name" class="form-label">Name</label>
                                            <input type="text" class="form-control" id="name" name="name" aria-describedby="emailHelp" required>
                                          </div>
                                          <div class="mb-3">
                                                <label for="age" class="form-label">Age</label>
                                                <input type="text" class="form-control" id="age" name="age" required>
                                              </div>
                                          <div class="mb-3">
                                                <label for="job" class="form-label">Your Job</label>
                                                <select class="form-select" aria-label="Job" id="job" name="job" required>
                                                      <option selected disabled>Choose your job...</option>
                                                      @foreach ($jobs as $job)
                                                      <option value="{{ $job->id }}">{{ $job->name }}</option>
                                                      @endforeach 
                                                </select>
                                          </div>
                                          <button type="submit" class="btn btn-primary">Submit</button>
                                    </form>
                                    
                              </div>
                        </div>
                  </div>
            </section>
      </div>

</x-app>