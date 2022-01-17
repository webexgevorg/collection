<?php
	include "config/con1.php";
	if(isset($_POST['k'])){
		$id  = mysqli_real_escape_string($con, $_POST['k']);
		$sql = "SELECT set_type, b.id as id FROM collections c, base_checklist b WHERE c.id=b.realese_id AND c.id=$id GROUP BY b.set_type";
		$res = mysqli_query($con, $sql);
		while($tox = mysqli_fetch_assoc($res)){
			echo "<option value=".$tox['id']." >".$tox['set_type']."</option>";
		}
	}
	if(isset($_POST['sport_type'])){
		$id  = mysqli_real_escape_string($con, $_POST['sport_type']);
		$sql = "SELECT c.sport_type as sport_type, b.id as id FROM collections c, base_checklist b WHERE c.id=b.realese_id AND c.id=$id GROUP BY c.sport_type";
		$res = mysqli_query($con, $sql);
		while($tox = mysqli_fetch_assoc($res)){
			echo "<option value=".$tox['id'].">".$tox['sport_type']."</option>";
		}
	}
	if(isset($_POST['id_settype1'])){
		$rid  = mysqli_real_escape_string($con, $_POST['rid']);
		$id  = mysqli_real_escape_string($con, $_POST['id_settype1']);
		$sel = "SELECT set_type FROM base_checklist WHERE id='$id' ";
		$query = mysqli_query($con, $sel);
		$tox = mysqli_fetch_assoc($query);
		$set_type = $tox['set_type'];
		echo $set_type;
		$sql = "SELECT card_number, id FROM base_checklist WHERE realese_id='$rid' AND set_type='$set_type' GROUP BY card_number ORDER BY id ASC";
		$res = mysqli_query($con, $sql);
		while($tox = mysqli_fetch_assoc($res)){
			echo "<option value=".$tox['id'].">".$tox['card_number']."</option>";
		}
	}
	if(isset($_POST['id_settype2'])){
		$rid  = mysqli_real_escape_string($con, $_POST['rid']);
		$id  = mysqli_real_escape_string($con, $_POST['id_settype2']);
		$sel = "SELECT card_number, set_type FROM base_checklist WHERE id='$id' ";
		$query = mysqli_query($con, $sel);
		$tox = mysqli_fetch_assoc($query);
		$card_number = $tox['card_number'];
		$set_type = $tox['set_type'];
		$sql = "SELECT card_name, id FROM base_checklist WHERE card_number='$card_number' AND realese_id='$rid' AND set_type='$set_type' GROUP BY card_name";
		$res = mysqli_query($con, $sql);
		while($tox = mysqli_fetch_assoc($res)){
			echo "<option value=".$tox['id'].">".$tox['card_name']."</option>";
		}
	}
	if(isset($_POST['id_settype3'])){
		$rid  = mysqli_real_escape_string($con, $_POST['rid']);
		$id  = mysqli_real_escape_string($con, $_POST['id_settype3']);
		
		$sql = "SELECT team, id FROM `base_checklist` WHERE `realese_id` = '$rid' AND `id`= '$id' ORDER BY team ASC";
		$res = mysqli_query($con, $sql);
		while($tox = mysqli_fetch_assoc($res)){
			echo "<option value=".$tox['id'].">".$tox['team']."</option>";
		}
	}
	if(isset($_POST['id_team'])){
		$rid  = mysqli_real_escape_string($con, $_POST['rid']);
		$id  = mysqli_real_escape_string($con, $_POST['id_team']);

		$set_type  = mysqli_real_escape_string($con, $_POST['set_type']);
		$sel = "SELECT set_type FROM base_checklist WHERE id='$set_type' ";
		$query = mysqli_query($con, $sel);
		$tox = mysqli_fetch_assoc($query);
		$set_type1 = $tox['set_type'];

		$card_name  = mysqli_real_escape_string($con, $_POST['card_name']);
		$sel = "SELECT card_name, id FROM base_checklist WHERE id='$card_name' ";
		$query = mysqli_query($con, $sel);
		$tox = mysqli_fetch_assoc($query);
		$card_name1 = $tox['card_name'];

		$sql = "SELECT parallel, id FROM base_checklist WHERE card_name='$card_name1' AND realese_id='$rid' AND set_type='$set_type1' GROUP BY parallel";
		$res = mysqli_query($con, $sql);
		while($tox = mysqli_fetch_assoc($res)){
			echo "<option value=".$tox['id'].">".$tox['parallel']."</option>";
		}
	}
	if(isset($_POST['parallel'])){
		$rid  = mysqli_real_escape_string($con, $_POST['rid']);
		$parallel  = mysqli_real_escape_string($con, $_POST['parallel']);
		$sel = "SELECT * FROM base_checklist WHERE id='$parallel' ";
		$query = mysqli_query($con, $sel);
		$tox = mysqli_fetch_assoc($query);
		$parallel1 = $tox['parallel'];

		$set_type  = mysqli_real_escape_string($con, $_POST['set_type']);
		$sel = "SELECT set_type FROM base_checklist WHERE id='$set_type' ";
		$query = mysqli_query($con, $sel);
		$tox = mysqli_fetch_assoc($query);
		$set_type1 = $tox['set_type'];

		$card_number  = mysqli_real_escape_string($con, $_POST['card_number']);
		$sel = "SELECT card_number FROM base_checklist WHERE id='$card_number' ";
		$query = mysqli_query($con, $sel);
		$tox = mysqli_fetch_assoc($query);
		$card_number1 = $tox['card_number'];
		$sql = "SELECT print_run, id FROM base_checklist WHERE realese_id='$rid' AND set_type='$set_type1' AND card_number='$card_number1' AND parallel='$parallel1' ORDER BY `base_checklist`.`id` ASC";
		

		$res = mysqli_query($con, $sql);
		while($tox = mysqli_fetch_assoc($res)){
			echo "<option value=".$tox['id'].">".$tox['print_run']."</option>";
		}
	}
?>