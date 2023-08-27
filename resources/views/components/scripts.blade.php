<!-- Vendor JS Files -->
<script src="{{asset('NiceAdmin/assets/vendor/apexcharts/apexcharts.min.js')}}"></script>
<script src="{{asset('NiceAdmin/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('NiceAdmin/assets/vendor/chart.js/chart.umd.js')}}"></script>
<script src="{{asset('NiceAdmin/assets/vendor/echarts/echarts.min.js')}}"></script>
<script src="{{asset('NiceAdmin/assets/vendor/quill/quill.min.js')}}"></script>
<script src="{{asset('NiceAdmin/assets/vendor/simple-datatables/simple-datatables.js')}}"></script>
<script src="{{asset('NiceAdmin/assets/vendor/tinymce/tinymce.min.js')}}"></script>
<script src="{{asset('NiceAdmin/assets/vendor/php-email-form/validate.js')}}"></script>

<script src="{{asset('NiceAdmin/assets/vendor/bootstrap/js/pdfmake.js')}}"></script>
<script src="{{asset('NiceAdmin/assets/vendor/bootstrap/js/vfs_fonts.js')}}"></script>
<script src="{{asset('NiceAdmin/assets/vendor/bootstrap/js/datatables-bundle.js')}}"></script>
<!-- Template Main JS File -->
<script src="{{asset('NiceAdmin/assets/js/main.js')}}"></script>


@role('admin')
<script>

    function getAdminNotif(){
        $.ajax({
            url :"{{route('admin.notification.pending')}}",
            method: "GET",
            success: function (response){
                console.log(response.pendings);
                $("#admin_notif_badge_number").text(response.count);
                $("#admin_notif_number").text(response.count);

                let html = '';

                response.pendings.forEach(element => {
                    html += `
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li class="notification-item">
                            <i class="bi bi-x-circle text-danger"></i>
                            <a href="{{url('/admin/notification/act/${element.id}')}}">
                                <div>
                                    <h4>${element.requestor}</h4>
                                    <p>You have pending request</p>
                                    <p>${element.created_at_diff}</p>
                                </div>
                            </a>
                        </li>`;
                });
                $("#admin_list_notif").html(html);
            }
        });
    }
    setInterval(getAdminNotif, 5000);

    getAdminNotif();

</script>

@endrole


@role('branch-head')
<script>

    function getBranchHeadNotif(){
        $.ajax({
            url :"{{route('branch-head.notification.pending')}}",
            method: "GET",
            success: function (response){
                console.log(response.pendings);
                $("#branch_head_notif_badge_number").text(response.count);
                $("#branch_head_notif_number").text(response.count);
                let html = '';
                response.pendings.forEach(element => {
                    html += `
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li class="notification-item">
                            <i class="bi ${element.status === 'declined' ? 'bi-x-circle text-danger' : 'bi-check-circle text-success'}"></i>
                            <a href="{{url('/branch-head/notification/act/${element.id}')}}">
                                <div>
                                    <h4>${element.status.toUpperCase()}</h4>
                                    <p>Admin ${element.status} your request</p>
                                    <p>${element.created_at_diff}</p>
                                </div>
                            </a>
                        </li>`;
                });
                $("#branch_head_list_notif").html(html);
            }
        });
    }
    setInterval(getBranchHeadNotif, 5000);

    getBranchHeadNotif();

</script>

@endrole
