<?php echo $header ?>

<div class="page has-sidebar-left height-full">
    <header class="blue accent-3 relative nav-sticky">
        <div class="container-fluid text-white">
            <div class="row p-t-b-10 ">
                <div class="col">
                    <h4>
                        <a href="<?php echo site_url('presensi/ekstrakurikuler') ?>">
                            <i class="icon-arrow_back"></i>
                        </a>
                        <i class="icon-class"></i>
                        Presensi Eksktrakurikuler - 
                    </h4>
                </div>
            </div>
        </div>
    </header>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card mt-3 mb-3 no-b">
                            <div class="card-body">
                                <div class="card-title">Presensi - </div>
                                <table id="example2" class="table table-bordered table-hover data-tables" data-options='{"paging": false; "searching":false}'>
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>T/J Selesai</th>
                                            <th>Pertemuan</th>
                                            <th>Kegiatan</th>
                                            <th>Daftar Hadir</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>26 April 2019 / 09:00</td>
                                            <td>Ke-1</td>
                                            <td>Perkenalan diri dan pembentukan kelompok</td>
                                            <td>
                                                <a href="#" class="btn btn-primary btn-xs">Daftar Hadir</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>3 Mei 2019 / 09:00</td>
                                            <td>Ke-2</td>
                                            <td>Latihan untuk persiapan lomba tingkat Jawa Timur</td>
                                            <td>
                                                <a href="#" class="btn btn-primary btn-xs">Daftar Hadir</a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
	function format (d) {
	    // `d` is the original data object for the row
	    return '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">'+
	        '<tr>'+
	            '<td>Full name:</td>'+
	            '<td>'+d.name+'</td>'+
	        '</tr>'+
	        '<tr>'+
	            '<td>Extension number:</td>'+
	            '<td>'+d.extn+'</td>'+
	        '</tr>'+
	        '<tr>'+
	            '<td>Extra info:</td>'+
	            '<td>And any further details here (images etc)...</td>'+
	        '</tr>'+
	    '</table>';
	}

	$(document).ready(function() {
	    var table = $('#example').DataTable({
	        "ajax": "../ajax/data/objects.txt",
	        "columns": [
	            {
	                "className":      'details-control',
	                "orderable":      false,
	                "data":           null,
	                "defaultContent": ''
	            },
	            { "data": "name" },
	            { "data": "position" },
	            { "data": "office" },
	            { "data": "salary" }
	        ],
	        "order": [[1, 'asc']]
	    });
	     
	    // Add event listener for opening and closing details
	    $('#example tbody').on('click', 'td.details-control', function () {
	        var tr = $(this).closest('tr');
	        var row = table.row(tr);
	 
	        if(row.child.isShown()) {
	            // This row is already open - close it
	            row.child.hide();
	            tr.removeClass('shown');
	        } else {
	            // Open this row
	            row.child(format(row.data())).show();
	            tr.addClass('shown');
	        }
	    });
	});

	function createNode(element) {
	    return document.createElement(element);
	}

	function append(parent, el) {
		return parent.appendChild(el);
	}

	const ul = document.getElementById('authors');
	const url = 'https://randomuser.me/api/?results=10';
	fetch(url)
	.then((resp) => resp.json())
	.then(function(data) {
	    let authors = data.results;
	    return authors.map(function(author) {
	      	let li = createNode('li'),
	        img = createNode('img'),
	        span = createNode('span');
	      	img.src = author.picture.medium;
	      	span.innerHTML = `${author.name.first} ${author.name.last}`;
	      	append(li, img);
	      	append(li, span);
	      	append(ul, li);
	    })
	})
	.catch(function(error) {
		console.log(error);
	});   
</script>

<?php echo $footer ?>