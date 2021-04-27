  {{-- navbar --}}

  @extends('layouts.app')

  @section('content')
      {{-- header --}}
      <header id="home-section">
          <div class="dark-overlay">
              <div class="home-inner">
                  <div class="container">
                      <h1 class="text-lg-left text-center">{{ $title . config('app.name') }}</h1>
                      {{-- <h3 class="">
                        @if (session('status'))
                        <div class="bg-success p-2 rounded mb-2 text-warning text-center">
                            {{ session('status') }}
                        </div>

                    @endif

                      </h3> --}}
                      {{-- grid system --}}
                      <div class="row">
                          <div class="col-lg-8 d-none d-lg-block">
                              <h1 class="display-4">Build <strong>social profiles</strong> & befriend everyone</h1>
                              {{-- flex in row --}}
                              <div class="d-flex flex-row">
                                  <div class="p-4 align-self-start">
                                      <i class="fa fa-check"></i>
                                  </div>
                                  <div class="p-4 align-self-end">Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                                      Tenetur repellendus neque perspiciatis! Illo, provident expedita.</div>
                              </div>
                              <div class="d-flex flex-row">
                                  <div class="p-4 align-self-start">
                                      <i class="fa fa-check"></i>
                                  </div>
                                  <div class="p-4 align-self-end">Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                                      Tenetur repellendus neque perspiciatis! Illo, provident expedita.</div>
                              </div>
                              <div class="d-flex flex-row">
                                  <div class="p-4 align-self-start">
                                      <i class="fa fa-check"></i>
                                  </div>
                                  <div class="p-4 align-self-end">Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                                      Tenetur repellendus neque perspiciatis! Illo, provident expedita.</div>
                              </div>
                          </div>
                          @guest
                              <div class="col-lg-4">
                                  <x-registerform />
                              </div>
                          @endguest
                      </div>
                  </div>
              </div>
          </div>
      </header>

      <section id="explore-head-section">
          <div class="container">
              <div class="row">
                  <div class="col text-center">
                      <div class="p-5">
                          <h1 class="display-4">Explore more</h1>
                          <p class="lead">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor quas ullam iure
                              officia, tempora maxime accusamus expedita quos ad ut nobis eum. Inventore, nobis. Quae
                              laborum quod nemo praesentium dolorem?</p>
                          <a href="#" class="btn btn-outline-primary">Find out more</a>
                      </div>
                  </div>
              </div>
          </div>
      </section>

      {{-- footer --}}

      <footer id="footer" class="bg-custom-1">
          <div class="container">
              <div class="row">
                  <div class="col text-center">
                      <div class="py-4 text-light">
                          <div class="d-inline-flex px-2 bd-highlight justify-content-between">
                              <h3>{{ config('app.name') }}</h3>
                          </div>
                          <div class="d-inline-flex px-2 bd-highlight justify-content-between">
                              <p>Copyright &copy 2021</p>
                          </div>
                          <div class="d-inline-flex px-2 bd-highlight justify-content-between"><button
                                  class="btn btn-danger" data-toggle="modal" data-target="#contactModal">Feedback</button>
                          </div>

                          <div class="d-inline-flex px-2 bd-highlight justify-content-between">
                              <a href="{{ route('about') }}" class="btn btn-secondary" data-toggle="button"
                                  data-target={{ route('services') }}>About Us</a>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </footer>

      {{-- modal --}}

      <div class="modal text-dark mt-5" id="contactModal">
          <div class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title" id="contactModalTitle">Give us feedback!</h5>
                      <button class="close" data-dismiss="modal" aria-label="close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  <div class="modal-body">
                      <form action="">
                          <div class="form-group">
                              <label for="name">Name</label>
                              <input type="text" name="name" id="name" class="form-control">
                          </div>
                          <div class="form-group">
                              <label for="email">Email</label>
                              <input type="email" name="email" id="email" class="form-control">
                          </div>
                          <div class="form-group">
                              <label for="message">Message</label>
                              <textarea class="form-control"></textarea>
                          </div>
                      </form>
                  </div>
                  <div class="modal-footer">
                      <button class="btn btn-primary btn-block">Submit</button>
                  </div>
              </div>
          </div>
      </div>


  @endsection
