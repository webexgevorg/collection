<?php
	include "config/con1.php";
	if(isset($_POST['rid'])){
		$rid  = mysqli_real_escape_string($con, $_POST['rid']);
		$id  = mysqli_real_escape_string($con, $_POST['id']);

		if($rid == 0){
			$sql = "SELECT name_of_collection,id FROM collections";
			$res = mysqli_query($con, $sql);
			echo '<select class="form-control bname1" name="basechecklist"><option></option>';
			while( $tox = mysqli_fetch_array($res) ){
		?>
			<option value = "<?php echo $tox['id'] ?>"><?php echo $tox['name_of_collection'] ?></option>
		<?php
			}
		}
		else {
			$sql = "SELECT name_of_collection FROM collections WHERE id=$rid";
			$res = mysqli_query($con, $sql);
			$tox = mysqli_fetch_assoc($res);

			$sel = "SELECT * FROM collections";
			$rez = mysqli_query($con, $sel);
			echo '<select class="form-control bname1" name="basechecklist">';
			while( $row10 = mysqli_fetch_array($rez) ){
	?>
			<option value = "<?php echo $row10['id'] ?>" 
			<?php 
			if(($tox['name_of_collection'] == $row10['name_of_collection'])){
			echo 'selected = "selected"';
			} ?>>
			<?php echo $row10['name_of_collection']; ?></option>
	<?php		    
			}
			echo "</select>";
		}

		
	}
	if(isset($_POST['sport_type'])){
		$id  = mysqli_real_escape_string($con, $_POST['sport_type']);
		$cust = "SELECT * FROM `personal_checklist` WHERE id='$id'";
		$query = mysqli_query($con, $cust);
		$tox = mysqli_fetch_assoc($query);
		echo '<select  class="form-control sport_type1" name="sport_type">';
		echo '<option value='.$tox['id'].'>'.$tox['sport_type'].'</option>';	
		echo "</select>";

	}
	if(isset($_POST['set_type'])){
		$id  = mysqli_real_escape_string($con, $_POST['set_type']);
		$rid  = mysqli_real_escape_string($con, $_POST['rid_set']);
		$cust = "SELECT * FROM `personal_checklist` WHERE id='$id'";
		$query = mysqli_query($con, $cust);
		$tox = mysqli_fetch_assoc($query);

		$sql = "SELECT * FROM base_checklist WHERE realese_id='$rid' GROUP BY set_type";
		$res = mysqli_query($con, $sql);
		echo '<select class="form-control set_type1" name="set_type"><option></option>';
		while( $row10 = mysqli_fetch_assoc($res) ){
?>
		<option value = "<?php echo $row10['id'] ?>" data-value="<?php echo $row10['id'] ?>" 
		<?php 
		if(($tox['set_type'] == $row10['set_type'])){
		echo 'selected = "selected"';
		} ?>>
		<?php echo $row10['set_type']; ?></option>
<?php		    
		}
		echo "</select>";

	}
	if(isset($_POST['card_number'])){
		$id  = mysqli_real_escape_string($con, $_POST['card_number']);
		$rid  = mysqli_real_escape_string($con, $_POST['rid_number']);
		$cust = "SELECT * FROM `personal_checklist` WHERE id='$id'";
		$query = mysqli_query($con, $cust);
		$tox = mysqli_fetch_assoc($query);
		$set_type = $tox['set_type'];
		$bname = $tox['base_checklist_name'];

		$sql = "SELECT card_number, id FROM base_checklist WHERE realese_id='$rid' AND set_type='$set_type' GROUP BY card_number ORDER BY id ASC";
		$res = mysqli_query($con, $sql);
		echo '<select class="form-control card_number1" name="card_number" >';
		while( $row10 = mysqli_fetch_array($res) ){
?>
		<option value = "<?php echo $row10['id'] ?>" 
		<?php 
		if(($tox['card_number'] == $row10['card_number'])){
		echo 'selected = "selected"';
		} ?>>
		<?php echo $row10['card_number']; ?></option>
<?php		    
		}
		echo "</select>";
	}
	if(isset($_POST['card_name'])){
		$id  = mysqli_real_escape_string($con, $_POST['card_name']);
		$rid  = mysqli_real_escape_string($con, $_POST['rid_name']);
		$cust = "SELECT * FROM `personal_checklist` WHERE id='$id'";
		$query = mysqli_query($con, $cust);
		$tox = mysqli_fetch_assoc($query);
		$set_type = $tox['set_type'];
		$bname = $tox['base_checklist_name'];
		$card_number = $tox['card_number'];

		$sql = "SELECT card_name, id FROM base_checklist WHERE card_number='$card_number' AND realese_id='$rid' AND set_type='$set_type' GROUP BY card_name";
		$res = mysqli_query($con, $sql);
		echo '<select class="form-control selectpicker card_name1" name="card_name">';
		while( $row10 = mysqli_fetch_array($res) ){
?>
		<option value = "<?php echo $row10['id'] ?>" 
		<?php 
		if(($tox['card_name'] == $row10['card_name'])){
		echo 'selected = "selected"';
		} ?>>
		<?php echo $row10['card_name']; ?></option>
<?php		    
		}
		echo "</select>";
	}
	if(isset($_POST['team'])){
		$id  = mysqli_real_escape_string($con, $_POST['team']);
		$rid  = mysqli_real_escape_string($con, $_POST['rid_team']);
		$cust = "SELECT * FROM `personal_checklist` WHERE id='$id'";
		$query = mysqli_query($con, $cust);
		$tox = mysqli_fetch_assoc($query);
		$set_type = $tox['set_type'];
		$card_number = $tox['card_number'];
		$card_name = $tox['card_name'];

		$sql = "SELECT team, id FROM `base_checklist` WHERE `realese_id` = '$rid' AND `set_type`= '$set_type' AND card_number='$card_number' AND card_name='$card_name' GROUP BY team ORDER BY team ASC";
		$res = mysqli_query($con, $sql);
		echo '<select class="form-control selectpicker team1" name="team">';
		while( $row10 = mysqli_fetch_array($res) ){
?>
		<option value = "<?php echo $row10['id'] ?>" 
		<?php 
		if(($tox['team'] == $row10['team'])){
		echo 'selected = "selected"';
		} ?>>
		<?php echo $row10['team']; ?></option>
<?php		    
		}
		echo "</select>";
	}
	if(isset($_POST['parallel'])){
		$id  = mysqli_real_escape_string($con, $_POST['parallel']);
		$rid  = mysqli_real_escape_string($con, $_POST['rid_parallel']);
		$cust = "SELECT * FROM `personal_checklist` WHERE id='$id'";
		$query = mysqli_query($con, $cust);
		$tox = mysqli_fetch_assoc($query);
		$set_type = $tox['set_type'];
		$bname = $tox['base_checklist_name'];
		$card_number = $tox['card_number'];
		$card_name = $tox['card_name'];

		$sql = "SELECT parallel, id FROM base_checklist WHERE  realese_id='$rid' AND set_type='$set_type' AND card_name='$card_name' GROUP BY parallel";
		$res = mysqli_query($con, $sql);
		echo '<select class="form-control selectpicker parallel1" name="parallel">';
		while( $row10 = mysqli_fetch_array($res) ){
?>
		<option value = "<?php echo $row10['id'] ?>" 
		<?php 
		if(($tox['parallel'] == $row10['parallel'])){
		echo 'selected = "selected"';
		} ?>>
		<?php echo $row10['parallel']; ?></option>
<?php		    
		}
		echo "</select>";
	}
	
	if(isset($_POST['print_run'])){
		$id  = mysqli_real_escape_string($con, $_POST['print_run']);
		$rid  = mysqli_real_escape_string($con, $_POST['rid_print']);
		$cust = "SELECT * FROM `personal_checklist` WHERE id='$id'";
		$query = mysqli_query($con, $cust);
		$tox = mysqli_fetch_assoc($query);
		$set_type = $tox['set_type'];
		$card_number = $tox['card_number'];
		$card_name = $tox['card_name'];
		$parallel = $tox['parallel'];

		$sql = "SELECT print_run, id FROM base_checklist WHERE realese_id='$rid' AND set_type='$set_type' AND card_number='$card_number' AND parallel='$parallel' ORDER BY `base_checklist`.`id` ASC";
		$res = mysqli_query($con, $sql);
		echo '<select class="form-control selectpicker print_run1" name="print_run">';
		while( $row10 = mysqli_fetch_array($res) ){
?>
		<option value = "<?php echo $row10['id'] ?>" 
		<?php 
		if(($tox['print_run'] == $row10['print_run'])){
		echo 'selected = "selected"';
		} ?>>
		<?php echo $row10['print_run']; ?></option>
<?php		    
		}
		echo "</select>";
	}

?>
<script>
	$(document).ready(function(){
		$('.bname1').bind('change', function(){
        var k = $(this).val()
        $(this).parents('tr').find('.set_type1').empty()
        $(this).parents('tr').find('.card_number1').empty()
        $(this).parents('tr').find('.card_name1').empty()
        $(this).parents('tr').find('.team1').empty()
        $(this).parents('tr').find('.parallel1').empty()
        $(this).parents('tr').find('.print_run1').empty()
        var sport_type = $(this).parents('tr').find('.sport_type1')
        var set_type = $(this).parents('tr').find('.set_type1')

        $.post(
            "personal2.php",
            {k:k},
            function(ard){
                set_type.html("<option></option>"+ard)

            }
        )
        $.post(
            "personal2.php",
            {sport_type:k},
            function(ard){
                sport_type.html(ard)
            }
        )

    	})
    	$('.set_type1').bind('change', function(){
	        var k = $(this).val()
	        var rid=$(this).parents('tr').find('.bname1').val()
	        $(this).parents('tr').find('.card_name1').empty()
	        $(this).parents('tr').find('.team1').empty()
	        $(this).parents('tr').find('.parallel1').empty()
	        $(this).parents('tr').find('.print_run1').empty()
	        var card_number = $(this).parents('tr').find('.card_number1')
	        $.post(
	            "personal2.php",
	            {id_settype1:k,rid:rid},
	            function(ard){
	                card_number.html("<option></option>"+ard)
	            }
	        )
    	})
		$('.card_number1').bind('change', function(){
	        var k = $(this).val()
	        var rid=$(this).parents('tr').find('.bname1').val()
	        var set_type=$(this).parents('tr').find('.set_type1').val()
	        $(this).parents('tr').find('.card_name1').empty()
	        $(this).parents('tr').find('.team1').empty()
	        $(this).parents('tr').find('.parallel1').empty()
	        $(this).parents('tr').find('.print_run1').empty()
	        var card_name = $(this).parents('tr').find('.card_name1')
	        $.post(
	            "personal2.php",
	            {id_settype2:k,rid:rid,set_type:set_type},
	            function(ard){
	                card_name.html("<option></option>"+ard)
	            }
	        )
	    })
		$('.card_name1').bind('change', function(){
	        var k = $(this).val()
	        var rid=$(this).parents('tr').find('.bname1').val()
	        $(this).parents('tr').find('.team1').empty()
	        $(this).parents('tr').find('.parallel1').empty()
	        $(this).parents('tr').find('.print_run1').empty()
	        var team = $(this).parents('tr').find('.team1')
	        $.post(
	            "personal2.php",
	            {id_settype3:k,rid:rid},
	            function(ard){
	                team.html("<option></option>"+ard)
	            }
	        )
    	})
		$('.team1').bind('change', function(){
	        var k = $(this).val()
	        var rid = $(this).parents('tr').find('.bname1').val()
	        var card_name = $(this).parents('tr').find('.card_name1').val()
	        var set_type = $(this).parents('tr').find('.set_type1').val()
	        $(this).parents('tr').find('.parallel1').empty()
	        $(this).parents('tr').find('.print_run1').empty()
	        var parallel = $(this).parents('tr').find('.parallel1')
	        
	        $.post(
	            "personal2.php",
	            {id_team:k,rid:rid,card_name:card_name,set_type:set_type},
	            function(ard){
	                parallel.html("<option></option>"+ard)
	            }
	        )   
    	})
    	$('.parallel1').bind('change', function(){
        var k = $(this).val()
        var rid = $(this).parents('tr').find('.bname1').val()
        var card_number = $(this).parents('tr').find('.card_number1').val()
        var set_type = $(this).parents('tr').find('.set_type1').val()
        $(this).parents('tr').find('.print_run1').empty()
        var print_run = $(this).parents('tr').find('.print_run1')
        $.post(
            "personal2.php",
            {parallel:k,rid:rid,card_number:card_number,set_type:set_type},
            function(ard){
                print_run.html(ard)
            }
        )
    })

})
    
</script>