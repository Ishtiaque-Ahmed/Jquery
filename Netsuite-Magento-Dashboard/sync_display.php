<?php
    
    $fileRoot = dirname(__FILE__);
    require_once $fileRoot.'/attributes_netsuite.php';
    require_once $fileRoot.'/attributes_magento.php'
?>


<!DOCTYPE html>
<html>
    <head>
        <title>Place searches</title>
        <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
        <meta charset="utf-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script
            src="http://code.jquery.com/jquery-1.12.4.min.js"
            integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ="
        crossorigin="anonymous"></script>
        
        <!-- Latest compiled JavaScript -->
       
        <script src="https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/4.0.11/handlebars.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.css">
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.js"></script>

        <style type="text/css">
          




        </style>
     </head>
<body>

        <div class="container-fluid">

           <div class="row">
                <div class="col-sm-4" >
                    <table id="example" class="table">
                        <thead>
                            <tr >
                                <th>Netsuite Attribute</th>
                                <th>Data Type</th>
                                
                            </tr>
                        </thead>
                       
                          
                        </tr>
               
                    </table>
                </div>
                <div class="col-sm-4">
                    <table id="example1" class="table" >
                        <thead>
                            <tr >
                                <th>Magento Attribute</th>
                                <th>Data Type</th>
                                
                            </tr>
                        </thead>
                      
                    </table>
                </div>
            </div>
            <div class="container">
                <button id="match" class="btn btn-primary" type="submit">Match</button>
            </div>
            <div class="row">
                <div class="col-sm-4" >
                    <table id="finale" class="table">
                        <thead>
                            <tr >
                                <th>Netsuite Attribute</th>

                                <th></th>
                                <th>Magento Attribute</th>

                                <th>Matched Data Type</th>
                                
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>

        </div>
    <script type="text/javascript">
            var dfd = $.Deferred();
            var selected1="";
            var selected2="";
            var res1="";
            var res2="";
            var objects=new Array();
            var table;
            var table1;
            var dfd1 = $.Deferred();
            function insert_to_db(data,new_data_type)
            {
                 $.ajax({
                     
                     data: data,
                     type: "post",
                     url: "db_connect.php",
                     success: function(data){
                          //alert("Data Save: " + data);


                          
                           var sign=">>";
                           var color="#D5F89F";
                           if(selected1==""||selected2=="")
                           {
                                sign="X";
                                color="#F89F9F";
                           }
                           if(new_data_type==null)
                           {

                           }
                           var addrow='<tr><td>'+res1+"</td><td bgcolor="+color+">"+sign+"</td><td>"+res2+"</td><td>"+new_data_type+"</td></tr>";
                           $('#finale').append(addrow);
                           res1="";
                           res2="";
                           selected1="";
                           selected2="";
                           table.row('.selected').remove().draw( false );
                           table1.row('.selected').remove().draw( false );
                     },
                     error : function (re) {
                         console.log(re);
                     }

                    });
             
            }
    </script>
     <script type="text/javascript">
        $(function(){
            var data={};
            data.get_data="something";
            $.ajax({
                     data: data,
                     type: "post",
                     dataType: "json",
                     url: "db_connect.php",
                     success: function(data){
                         // alert("Data Save: " + data);
                            //var attributes=JSON.stringify(data);
                            //console.log(data);
                            for(x=0;x<data.length;x++)
                            {
                                //console.log(data[x]);
                                var attributes=JSON.stringify(data[x]);
                                var obj=JSON.parse(attributes);
                                console.log(obj.magento_field_name);
                                objects.push(obj);
                                var sign=">>";
                               var color="#D5F89F";
                               if(obj.magento_field_name==null||obj.netsuite_field_name==null)
                               {
                                    sign="X";
                                    color="#F89F9F";
                               }
                               if(obj.magento_field_name==null)
                               {
                                    obj.magento_field_name='';
                               }
                               if(obj.netsuite_field_name==null)
                               {
                                    obj.netsuite_field_name='';
                               }
                               var addrow='<tr><td>'+obj.netsuite_field_name+"</td><td bgcolor="+color+">"+sign+"</td><td>"+obj.magento_field_name+"</td><td>"+obj.final_data_type+"</td></tr>";
                               $('#finale').append(addrow);
                           }
                            dfd.resolve();

                            /*var obj=JSON.parse(data);
                            $.each( obj, function( key, value ) {
                                console.log(key+" "+value);

                            });*/
                            //console.log();
                            /*
                           */
                          
                     },
                     error : function (re) {
                         console.log(re);
                     }

                    });
             


        });
        

    </script>

    
   
    <script type="text/javascript">
        dfd.done(function(){
             $(document).ready(function() {
                var attributes=JSON.stringify(<?php echo(json_encode($types));?>);
                var obj=JSON.parse(attributes);
              //  console.log();
                 $.each( obj, function( key, value ) { 

                     var result=$.grep(objects, function(obj) { return obj.netsuite_field_name == key;});
                    if(result.length==0)
                    {
                         var row='<tr><td>';
                         row+=key+'</td>'+'<td>';
                         row+=value+'</td></tr>';
                         $('#example').append(row);
                    }
                    else{
                        console.log(result);
                    }
                   
                 });

                 var magento_attr=JSON.stringify(<?php echo(json_encode($magento_attr));?>);
                 var obj1=JSON.parse(magento_attr);

                 $.each( obj1, function( key, value ) {

                    var result=$.grep(objects, function(obj) { return obj.magento_field_name == key;});
                    if(result.length==0)
                    {
                        var row='<tr><td>';
                        row+=key+'</td>'+'<td>';
                        row+=value+'</td></tr>';
                       $('#example1').append(row);
                    }
                     else{
                        console.log(result);
                    }
                 });
                // console.log(obj1);



         });
             dfd1.resolve();

        });
        



    </script>
     <script type="text/javascript">
        dfd1.done(function()
        {
              $(document).ready(function() {
              table = $('#example').DataTable();//{searching: false});
              table1 = $('#example1').DataTable();//{searching: false});
           // $('#example').dataTable({searching: false, paging: false});
          
            $('#example tbody').on( 'click', 'tr', function () {
                if ( $(this).hasClass('selected') ) {
                    $(this).removeClass('selected');
                }
                else {
                    table.$('tr.selected').removeClass('selected');
                    
                    $(this).addClass('selected');

                }
                selected1= $(this).children(":first").text();
                res1=selected1;
                selected1+=" ";
                selected1+= $(this).children(":nth-child(2)").text();
                console.log($.type($(this).text()));
            } );
            $('#example1 tbody').on( 'click', 'tr', function () {
                if ( $(this).hasClass('selected') ) {
                    $(this).removeClass('selected');
                }
                else {
                    table1.$('tr.selected').removeClass('selected');
                    
                    $(this).addClass('selected');

                }
                selected2= $(this).children(":first").text();
                res2=selected2;
                selected2+=" ";
                selected2+= $(this).children(":nth-child(2)").text();
                console.log($.type($(this).text()));
            } );

         
         
            $('#button').click( function () {
                table.row('.selected').remove().draw( false );
            } );
        } );


        });
      
    </script>
    <script type="text/javascript">
        $(function()
        {
            $('#match').on('click',function(e) {
            if(selected1=="" && selected2=="")
            {

                    alert("No row selected");
            }
          
            else
            {

              var new_data_type=null;
              if(selected1!="" && selected2!=""){

                 new_data_type = prompt("Please enter new data type ");
                 if (new_data_type == null) {
                   alert("No finale data type selected");
                 }

              }
              var data = {};
              data.selected1=selected1;
              data.selected2=selected2;
              if(new_data_type!=null)data.newvar=new_data_type;
              console.log(data);
              insert_to_db(data,new_data_type);
             
            }
             

            });
        });
    </script>
   
</body>
</html>