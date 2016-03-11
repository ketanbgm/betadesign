<?php
	include('headerScripts.php'); 
	$numberofPages=$Cnt/$numberofrecords; 
	$numberofPages=ceil($numberofPages);
	$basepageset=5;
	$pageset=$basepageset;
	
	if($numberofPages < $pageset)
		$pageset=$numberofPages;
?>
<script>
	var pageset='<?php echo $pageset; ?>';
	var numberofPages='<?php echo $numberofPages; ?>';
	var basepageset='<?php echo $basepageset; ?>';
	var numberofrecords='<?php echo $numberofrecords; ?>';
	var url=pbaseurl+"index.php/cproduct/loadAccessories";
	$(function(){
			loadPagination1 =new loadPagination({'start':1,'end':pageset,'pageno':1,'id':'pagination','pageset':pageset,'basepageset':basepageset,'numberofpages':numberofPages,'url':url,'numberofrecords':numberofrecords});
			loadPagination1.load();
	});
</script>
<script type="text/javascript" src="<?php echo $base; ?>js/accessories.js"></script>
<script type="text/javascript" src="<?php echo $base; ?>js/pagination.js"></script>
</head>
<?php include('menu.php'); ?>
<div class="panel panel-default " style="border-collapse:0px solid red;">
    <div class="panel-heading">Lookup Product<span class="pull-right"><a href="<?php echo $base; ?>index.php/clogin/accessories" class="lookupclass">New</a></span></div>
    <div class="panel-body">
	 <div class="paginationView">
         <ul class="pagination" id="pagination" style="marign:0px;" align="left"></ul> 
    </div>
    <div class="lookupView">
    	<table class="table table-bordered tbl" align="center" id="pgnationTbl">
            <tr>
            	<th width="10%">Sl No.</th>
                 
                <th width="30%">Accessory Name</th>
                
                <th width="20%">Price</th>
                <!--<th width="50%">Specification</th>-->
               <th width="10%">Delete</th>
            </tr>
         </table>
<?php include('footer.php');?>