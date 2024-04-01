 <!-- Theme JS -->
 <!-- Vendor JS -->
 <script src="{{ asset('template') }}/dist/assets/js/vendor.bundle.js"></script>

 <!-- Theme JS -->
 <script src="{{ asset('template') }}/dist/assets/js/theme.bundle.js"></script>

 <script>
     $('#myTable').DataTable();
     $('#myTable2').DataTable();
     $('#myTable3').DataTable();
     $('#myTable4').DataTable();
     $('#myTable5').DataTable();
     $('#myTable6').DataTable();

     $('.card-home').on('mouseenter', function() {
         $(this).css('background-color', '#b3cdf2')
         $(this).children('.card-header').css('background-color', '#b3cdf2')
     })

     $('.card-home').on('mouseleave', function() {
         $(this).css('background-color', '')
         $(this).children('.card-header').css('background-color', '')
     })

     $("#kriteria_sub_kriteria_id").change(function() {
         var idSubKriteria = $(this).val();
         $.ajax({
             url: "{{ route('sub_kriteria-request') }}",
             method: 'GET',
             cache: false,
             dataType: 'json',
             success: function(data) {
                 console.log(data)
                 var html = "";
                 data[0].forEach(element => {
                     if (element.id == idSubKriteria) {
                         if (element.kriteria_sub_kriteria !== null) {
                             data[1].forEach(elementKrit => {
                                 var valid = true
                                 element.kriteria_sub_kriteria.forEach(
                                     elementSubKrit => {
                                         if (elementKrit.id == elementSubKrit
                                             .kriteria_id) {
                                             valid = false
                                         }
                                     })
                                 if (valid == false) {
                                     html += '<option class="text-danger" value="' +
                                         elementKrit
                                         .id + '"disabled>' + elementKrit.nama +
                                         ' (sub kriteria sudah ada!)</option>'
                                 } else {
                                     html += '<option value="' + elementKrit
                                         .id + '">' + elementKrit.nama +
                                         '</option>'
                                 }

                             })
                         }
                     }
                 })
                 $("#kriteria_id").html(
                     '<option value="" selected disabled>Pilih Kriteria ...</option>' + html);
             }
         })
     })

     $("#siswa_kriteria_id").change(function() {
         var idKriteria = $(this).val();
         $.ajax({
             url: "{{ route('siswa_kriteria-request') }}",
             method: 'GET',
             cache: false,
             dataType: 'json',
             success: function(data) {
                 console.log(data)
                 var html = "";
                 data[0].forEach(element => {
                     if (element.id == idKriteria) {
                         if (element.siswa_kriteria !== null) {
                             data[1].forEach(elementSis => {
                                 var valid = true
                                 element.siswa_kriteria.forEach(
                                     elementKrit => {
                                         if (elementSis.id == elementKrit
                                             .siswa_id) {
                                             valid = false
                                         }
                                     })
                                 if (valid == false) {
                                     html += '<option class="text-danger" value="' +
                                         elementSis
                                         .id + '"disabled>' + elementSis.nama +
                                         ' (kriteria sudah ada!)</option>'
                                 } else {
                                     html += '<option value="' + elementSis
                                         .id + '">' + elementSis.nama +
                                         '</option>'
                                 }

                             })
                         }
                     }
                 })
                 $("#siswa_id").html(
                     '<option value="" selected disabled>Pilih Siswa ...</option>' + html);
             }
         })
     })

     $("#kecamatan_id").change(function() {
         var idKecamatan = $(this).val();
         $.ajax({
             url: "{{ route('kecamatan-request') }}",
             method: 'GET',
             cache: false,
             dataType: 'json',
             success: function(data) {
                 //  console.log(data[0])
                 var html = "";
                 data[0].forEach(element => {
                     if (element.id == idKecamatan) {
                         if (element.kelurahan !== null) {
                             element.kelurahan.forEach(element => {
                                 html += '<option value="' + element
                                     .id + '">' + element.nama +
                                     '</option>'
                             })
                         }
                     }
                 })
                 //  console.log(html)
                 $("#kelurahan_id").html(
                     '<option value="" selected disabled>Pilih Kelurahan ...</option>' + html);
             }
         })
     })

     $("#tingkat_id").change(function() {
         var idTingkat = $(this).val();
         $.ajax({
             url: "{{ route('tingkat-request') }}",
             method: 'GET',
             cache: false,
             dataType: 'json',
             success: function(data) {
                 console.log(data[0])
                 var html = "";
                 data[0].forEach(element => {
                     if (element.id == idTingkat) {
                         if (element.kelas !== null) {
                             element.kelas.forEach(element => {
                                 html += '<option value="' + element
                                     .id + '">' + element.nama +
                                     '</option>'
                             })
                         }
                     }
                 })
                 //  console.log(html)
                 $("#kelas_id").html(
                     '<option value="" selected disabled>Pilih Kelas ...</option>' + html);
             }
         })
     })

     $(function() {
         $('#datepicker').datepicker();
     });

     $('#login').hover(() => {
         $('#login').toggleClass('text-primary')
     })

     @if (Session::has('succMessage'))
         Swal.fire({
             icon: 'success',
             title: '{{ Session::get('succMessage') }}',
             timer: 3000
         })
     @elseif (Session::has('errMessage'))
         Swal.fire({
             icon: 'error',
             title: '{{ Session::get('errMessage') }}'
             // timer: 3000
         })
     @elseif (Session::has('warnMessage'))
         Swal.fire({
             icon: 'warning',
             title: '{{ Session::get('warnMessage') }}'
             // timer: 3000
         })
     @elseif (Session::has('logMessage'))
         Swal.fire({
             icon: 'success',
             title: '{{ Session::get('logMessage') }}',
             timer: 3000
         })
     @endif



     function hapus(id, controller) {
         Swal.fire({
             title: 'Yakin ingin Menghapus?',
             // text: "You won't be able to revert this!",
             icon: 'question',
             showCancelButton: true,
             confirmButtonColor: '#3085d6',
             cancelButtonColor: '#d33',
             confirmButtonText: 'Ya!',
             cancelButtonText: 'Batal'
         }).then((result) => {
             if (result.isConfirmed) {
                 window.location.replace('/' + controller + '-destroy/' + id);
             }
         })
     }

     function logout() {
         Swal.fire({
             title: 'Yakin ingin Logout?',
             // text: "You won't be able to revert this!",
             icon: 'question',
             showCancelButton: true,
             confirmButtonColor: '#3085d6',
             cancelButtonColor: '#d33',
             confirmButtonText: 'Logout!'
         }).then((result) => {
             if (result.isConfirmed) {
                 window.location.replace('/logout');
             }
         })
     }
 </script>

 </body>

 </html>
