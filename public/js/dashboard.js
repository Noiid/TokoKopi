$('.delete-item').on('click', function (event) {
    event.preventDefault();
    const url = $(this).attr('href');
    swal({
        title: 'Apakah yakin ingin menghapus data?',
        text: 'Data akan terhapus secara permanen',
        icon: 'warning',
        buttons: ["Tidak", "Ya!"],
    }).then(function (value) {
        if (value) {
            window.location.href = url;
        }
    });
});

$('.validasi-item').on('click', function (event) {
    event.preventDefault();
    const url = $(this).attr('href');
    swal({
        title: 'Apakah yakin ingin mem-validasi data?',
        text: 'Data akan ter-ubah status.',
        icon: 'warning',
        buttons: ["Tidak", "Ya!"],
    }).then(function (value) {
        if (value) {
            window.location.href = url;
        }
    });
});

$('.confirmDone').on('click', function (event) {
    event.preventDefault();
    const url = $(this).attr('href');
    swal({
        title: 'Apakah anda yakin barang telah diterima ?',
        text: 'Konfirmasikan selesai jika barang telah diterima.',
        icon: 'warning',
        buttons: ["Tidak", "Ya!"],
    }).then(function (value) {
        if (value) {
            window.location.href = url;
        }
    });
});


$('#btnCart').on('click', function (event) {
    event.preventDefault();
    var id_users = $(this).data('id_users');
    var id_produk = $(this).data('id_produk');
    var qty = parseInt($('.input-number').val());
    let _token = $('meta[name="csrf-token"]').attr('content');
    // var url = "{{ route('getSub', ':id') }}";
    // url = url.replace(':id', id);
    $.ajax({
        url: "/add-to-cart",
        type: "POST",
        data: {
            id: id_users,
            id_produk: id_produk,
            qty: qty,
            _token: _token
        },
        success: function (response) {
            console.log("Masuk ajax:");
            console.log(response);
            // $('#inputNoKontak').val(response);
            // if(response) {
            //     $('.success').text(response.success);
            //     $("#ajaxform")[0].reset();
            // }
        },
    });
});

$('input[id^="checkCart"]').change(function () {
    var id = $(this).data('id');
    qty = parseInt($('.cartQty' + id).val());
    var harga = $(this).data('harga');
    var total = qty * harga;
    var jum = parseInt($('#totalCart').text());
    var tot = parseInt($('#subTot').text());
    console.log(harga);
    var jumCheck = 0;
    if (this.checked) {
        console.log('masuk check');
        jum += qty;
        $('#totalCart').text(jum);
        tot += total;
        $('.subTotalCart').text(tot);
        $('input:checkbox.cb-cart').each(function () {
            if (this.checked) {
                jumCheck++;
            }
        });
        if (jumCheck == 0) {
            $('#submitCheckout').prop("disabled", true);
        } else {
            $('#submitCheckout').prop("disabled", false);
        }
    } else {
        jum -= qty;
        $('#totalCart').text(jum);
        tot = tot - total;

        $('.subTotalCart').text(tot);
        $('input:checkbox.cb-cart').each(function () {
            if (this.checked) {
                jumCheck++;
            }
        });
        if (jumCheck == 0) {
            $('#submitCheckout').prop("disabled", true);
        } else {
            $('#submitCheckout').prop("disabled", false);
        }
    }
});


$(document).ready(function () {
    var months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
    var nilai = [0,0,0,0,0,0,0,0,1,1,1,1];
    console.log("ini values sebelum");
    console.log(nilai);
    $.ajax({
        url: '/transaksi/chart',
        type: 'get',
        dataType: 'json',
        success: function (response) {
            console.log(response);
            var len = 0;
            if (response != null) {
                len = response.length;
            }
            nilai = [];
            if (len > 0) {
                for (var i = 0; i < len; i++) {

                    var val = response[i].jumlah;
                    // console.log("ini val "+i);
                    // console.log(val);
                    nilai.push(val);
                }
                console.log("ini values sesudah");
                console.log(nilai);
                var ctx = document.getElementById("myAreaChart");
                var myLineChart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: months,
                        datasets: [{
                            label: "Jumlah Transaksi",
                            lineTension: 0.3,
                            backgroundColor: "rgba(2,117,216,0.2)",
                            borderColor: "rgba(2,117,216,1)",
                            pointRadius: 5,
                            pointBackgroundColor: "rgba(2,117,216,1)",
                            pointBorderColor: "rgba(255,255,255,0.8)",
                            pointHoverRadius: 5,
                            pointHoverBackgroundColor: "rgba(2,117,216,1)",
                            pointHitRadius: 50,
                            pointBorderWidth: 2,
                            data: nilai,
                        }],
                    },
                    options: {
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero:true
                                }
                            }]
                        }
                    }
                });
            }
        }
    });    
});
