<!-- Footer opened -->
 <footer class="bg-white p-4">
      <div class="row">
        <div class="col-md-6">
          <div class="text-center text-md-left">
              <p class="mb-0"> &copy; {{ trans('main_sidebar.copyright') }}
                  <span id="copyright">
                      <script>
                          document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))
                      </script>
                  </span>. <a href="#"> {{ trans('main_sidebar.signature') }} </a>
                  {{ trans('main_sidebar.programmer_name') }}.
              </p>
          </div>
        </div>
        <div class="col-md-6">
          <ul class="text-center text-md-right">
            <li class="list-inline-item"><a href="#">Terms & Conditions </a> </li>
            <li class="list-inline-item"><a href="#">API Use Policy </a> </li>
            <li class="list-inline-item"><a href="#">Privacy Policy </a> </li>
          </ul>
        </div>
      </div>
    </footer>
<!-- Footer closed -->
