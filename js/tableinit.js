function loadDataTable(tableid){

    console.log('loadDataTable function');
    var Url = $('#'+tableid).attr('data-url');
    var columns = $('#'+tableid).attr('columns');
    var statefields = $('#'+tableid).attr('statefields');
    var searchfields = $('#'+tableid).attr('searchfields');
    if (columns) {
        var columnarray = columns.split('||');
        //console.log(widarray);
        var colstr = '';
        columnarray.forEach(function (cols) {
            colstr += '{"data" : "' +cols+ '"},';
        });
        colstr = colstr.substring(0, colstr.length - 1);

        colstr = '['+colstr+']';
    }
    console.log(colstr);
    var nostr = '{"targets": 0,"visible": false,"searchable": false}';
    var nosearchsort = $('#'+tableid).attr('no-search-sort');
    if (nosearchsort) {
        var nosearchsortarray = nosearchsort.split('||');
        //console.log(widarray);

        nosearchsortarray.forEach(function (colno) {
            nostr +=  ',{"targets": ['+colno+ '],"searchable": false,"orderable": false}';
        });
        //nostr = nostr.substring(0, nostr.length - 1);


    }
    nostr = '['+nostr+']';
    console.log(nostr);

    var widget = $('#' + tableid).attr('widget');
    if (widget) {
        var widarray = widget.split('||');
        //console.log(widarray);
        var urlstr = '';
        widarray.forEach(function (widget) {
            urlstr += '&' + widget + '=' + $("#" + widget).val();
        });
        //urlstr = urlstr.substring(0, urlstr.length - 1);
        //console.log(urlstr);
        Url += urlstr;
    }

    var datacolumn = JSON.parse(colstr);
    var coldefs = JSON.parse(nostr);
    console.log(datacolumn);
    var mytable = $('#'+tableid).DataTable({
        "stateSave": true,
        "stateDuration": 60,
        "dom": 'l<"toolbar">frtip',
        "aaSorting": [[0, 'desc']],
        "bDestroy": true,
        "processing": true,
        "serverSide": true,
        "ajax": {
            "type":'POST',
            "url" : Url,
            "data": function ( d ) {

                if (searchfields) {
                    var fieldarray = searchfields.split('||');
                    fieldarray.forEach(function (cols) {
                        var dataobj = cols;
                        d[dataobj] = $('#'+cols).val();

                    });

                }

            }
        },
        "columns":  datacolumn ,
        lengthMenu: [
            [10, 25, 50, 100, 200],
            ['10','25','50', '100', '200']
        ],
        buttons: [
            'pageLength'
        ],
        "columnDefs": coldefs ,
        "stateSaveParams": function (settings, data) {
            console.log('stateSaveParams');
            console.log(settings.sInstance);
            if (statefields) {
                var fieldarray = statefields.split('||');
                fieldarray.forEach(function (cols) {
                    var dataobj = cols;
                    data[dataobj] = $('#'+cols).val();

                });

            }

            console.log(JSON.stringify(data));
        },
        stateSaveCallback: function(settings,data) {
            console.log('stateSaveCallback');
            console.log(settings.sInstance);
            console.log(JSON.stringify(data));

            localStorage.setItem( 'DataTables_' + settings.sInstance, JSON.stringify(data) )
        },
        stateLoadCallback: function(settings) {
            console.log('stateLoadCallback');
            console.log(settings.sInstance);
            console.log($('#cleartablestate').val());
            if($('#tablestate').val() == 1)
                return JSON.parse( localStorage.getItem( 'DataTables_' + settings.sInstance ) );
            else {
                settings.fnStateSaveCallback.call( settings.sInstance, settings, {} );
                return JSON.parse( localStorage.getItem( 'DataTables_' + settings.sInstance ) );
            }

        },
        "stateLoadParams": function (settings, data) {
            $("#searchbox").val(data.search.search);
            if (statefields) {
                var fieldarray = statefields.split('||');
                fieldarray.forEach(function (cols) {
                    var dataobj = cols;
                    $('#'+cols).val(data[dataobj]);

                });

            }


        }
    });





}




