<?php $mod=7; $bandeau=0; REQUIRE "../conf/verifCook.php"; if(($connect!=0)AND($role > 2)){

	$compte=$_GET['compte'];
	$query = "SELECT Name_DealerPSI FROM Compte WHERE New_Num_Client='".$compte."'";
	$do = odbc_do ($connectbase, $query);
	$Name=odbc_result($do,'Name_DealerPSI');
	
	echo "<DIV class=z1><DIV class=content>";	
	echo "<H6><u>".odbc_result($do,'Name_DealerPSI')."</u></H6>";
	echo "</DIV></DIV>";
	
	/* Selection des derniers semaines*/
	$i=0;
	$query = "SELECT DISTINCT IdWeek FROM DealerPSI ORDER BY IdWeek DESC";
	$do = odbc_do ($connectbase, $query);
	while(odbc_fetch_row ($do) && $i<13){
		$weeku[$i] = odbc_result($do,'IdWeek');
		$i++;	
	}
	/* Selection des prochaines semaines */
	$i=0;
	$query = "SELECT DISTINCT UniversalWeek FROM Calendar WHERE UniversalWeek > '".$weeku[0]."'";
	$query .= " ORDER BY UniversalWeek ASC";
	$do = odbc_do ($connectbase, $query);
	while(odbc_fetch_row ($do) && $i<10){
		IF (preg_match("#[0-9]{1}$#i", odbc_result($do,'UniversalWeek'))) {
			$uweek[$i] = odbc_result($do,'UniversalWeek');
			$i++;	
		}
	}
	/* ---------------------------*/
		
	/* ---------QUARTER------------*/
	$qa=0;
	$query = "SELECT DISTINCT Quarter FROM DealerPSI, Produit WHERE Produit.Id=DealerPSI.IdProduit AND CI>0 ORDER BY Quarter DESC";
	$do = odbc_do ($connectbase, $query);
	while(odbc_fetch_row ($do) && $qa<2){
		$quarter[$qa] = odbc_result($do,'Quarter');
		$qa++;		
	}
	/* ----------------------------*/	

	/* --- Seuils --- */
		$query ="SELECT * FROM dsi_seuil";
		$do = odbc_do ($connectbase, $query); 
		while(odbc_fetch_row ($do)){
			IF (odbc_result($do,'Libelle')=="CI"){
				IF (odbc_result($do,'Niv1')>odbc_result($do,'Niv2')){ 
					$S2CI[odbc_result($do,'New_Num_Client')]=odbc_result($do,'Niv1'); $S1CI[odbc_result($do,'New_Num_Client')]=odbc_result($do,'Niv2'); }
				ELSE { $S1CI[odbc_result($do,'New_Num_Client')]=odbc_result($do,'Niv1'); $S2CI[odbc_result($do,'New_Num_Client')]=odbc_result($do,'Niv2'); }
			}
			
			IF (odbc_result($do,'Libelle')=="So4w"){
				IF (odbc_result($do,'Niv1')<odbc_result($do,'Niv2')){ 
					$S2SO[odbc_result($do,'New_Num_Client')]=odbc_result($do,'Niv1'); $S1SO[odbc_result($do,'New_Num_Client')]=odbc_result($do,'Niv2'); }
				ELSE { $S1SO[odbc_result($do,'New_Num_Client')]=odbc_result($do,'Niv1'); $S2SO[odbc_result($do,'New_Num_Client')]=odbc_result($do,'Niv2'); }
			}
			IF (odbc_result($do,'Libelle')=="DoI"){
				IF (odbc_result($do,'Niv1')>odbc_result($do,'Niv2')){ 
					$S2DoI[odbc_result($do,'New_Num_Client')]=odbc_result($do,'Niv1'); $S1DoI[odbc_result($do,'New_Num_Client')]=odbc_result($do,'Niv2'); }
				ELSE { $S1DoI[odbc_result($do,'New_Num_Client')]=odbc_result($do,'Niv1');	$S2DoI[odbc_result($do,'New_Num_Client')]=odbc_result($do,'Niv2'); }
			}
			IF (odbc_result($do,'Libelle')=="Freshness"){
				IF (odbc_result($do,'Niv1')<odbc_result($do,'Niv2')){ 
					$S2F[odbc_result($do,'New_Num_Client')]=odbc_result($do,'Niv1');	$S1F[odbc_result($do,'New_Num_Client')]=odbc_result($do,'Niv2'); }
				ELSE { $S1F[odbc_result($do,'New_Num_Client')]=odbc_result($do,'Niv1');		$S2F[odbc_result($do,'New_Num_Client')]=odbc_result($do,'Niv2'); }
			}
			IF (odbc_result($do,'Libelle')=="Weight"){
				IF (odbc_result($do,'Niv1')>odbc_result($do,'Niv2')){ 
					$S2R[odbc_result($do,'New_Num_Client')]=odbc_result($do,'Niv1');	$S1R[odbc_result($do,'New_Num_Client')]=odbc_result($do,'Niv2'); }
				ELSE { $S1R[odbc_result($do,'New_Num_Client')]=odbc_result($do,'Niv1');		$S2R[odbc_result($do,'New_Num_Client')]=odbc_result($do,'Niv2'); }
			}
		}
	/* ---------------------------*/
	
	/****************   CLIENT   ********************/
			/* -----Info Client ----- */
			
				$query ="SELECT Channel, New_Num_Client FROM Compte WHERE New_Num_Client='".$compte."'";
				
				$do = odbc_do ($connectbase, $query); 
				while(odbc_fetch_row ($do)){
					$channel=odbc_result($do,'Channel');
			

					IF (isset($S1CI[odbc_result($do,'New_Num_Client')])==FALSE){
						$NCI="Defaut";
					}
					ELSE {
						$NCI=odbc_result($do,'New_Num_Client');
					}
					IF (isset($S1SO[odbc_result($do,'New_Num_Client')])==FALSE){
						$NSO="Defaut";
					}
					ELSE {
						$NSO=odbc_result($do,'New_Num_Client');
					}
					IF (isset($S1DoI[odbc_result($do,'New_Num_Client')])==FALSE){
						$NDoI="Defaut";
					}
					ELSE {
						$NDoI=odbc_result($do,'New_Num_Client');
					}
					IF (isset($S1F[odbc_result($do,'New_Num_Client')])==FALSE){
						$NF="Defaut";
					}
					ELSE {
						$NF=odbc_result($do,'New_Num_Client');
					}
					IF (isset($S1R[odbc_result($do,'New_Num_Client')])==FALSE){
						$NR="Defaut";
					}
					ELSE {
						$NR=odbc_result($do,'New_Num_Client');
					}
				}					
								
			/* ----- CI ------*/
				$u=0;
				$query = "SELECT SUM(CI) AS SCI, IdWeek FROM DealerPSI, Compte, Produit WHERE Compte.New_Num_Client=DealerPSI.New_Num_Client AND DealerPSI.IdProduit =  Produit.Id AND Produit.Division='CS' ";
				$query .= "AND Compte.New_Num_Client='".$compte."' AND (";
				For ($u=0; $u<2; $u++){
						if ($u!=0){ $query.= " OR ";}
						$query .=" IdWeek='".$weeku[$u]."' ";
					}
				$query .= ") GROUP BY IdWeek ORDER BY IdWeek DESC";
				$do = odbc_do ($connectbase, $query); 
				while(odbc_fetch_row ($do)){
					$cic[odbc_result($do,'IdWeek')]=odbc_result($do,'SCI');
				
				}

			/* ----- SO ----- */
				$u=0;
				$query = "SELECT SUM(SO) AS SCO, IdWeek FROM DealerPSI, Compte, Produit WHERE Compte.New_Num_Client=DealerPSI.New_Num_Client AND DealerPSI.IdProduit =  Produit.Id AND Produit.Division='CS' ";
				$query .= "AND Compte.New_Num_Client='".$compte."' AND (";
				For ($u=0; $u<5; $u++){
						if ($u!=0){ $query.= " OR ";}
						$query .=" IdWeek='".$weeku[$u]."' ";
					}
				$query .= ") GROUP BY IdWeek ORDER BY IdWeek DESC";
				$do = odbc_do ($connectbase, $query); 
				while(odbc_fetch_row ($do)){
						$soc[odbc_result($do,'IdWeek')]=odbc_result($do,'SCO');
				}
					IF (isset($soc[$weeku[0]])==FALSE){ $soc[$weeku[0]]=0;}
					IF (isset($soc[$weeku[1]])==FALSE){ $soc[$weeku[1]]=0;}
					IF (isset($soc[$weeku[2]])==FALSE){ $soc[$weeku[2]]=0;}
					IF (isset($soc[$weeku[3]])==FALSE){ $soc[$weeku[3]]=0;}
					IF (isset($soc[$weeku[4]])==FALSE){ $soc[$weeku[4]]=0;}
					
					$Msoc[$weeku[0]]=($soc[$weeku[0]]+$soc[$weeku[1]]+$soc[$weeku[2]]+$soc[$weeku[3]])/4;
					$Msoc[$weeku[1]]=($soc[$weeku[1]]+$soc[$weeku[2]]+$soc[$weeku[3]]+$soc[$weeku[4]])/4;
				
															
			/* ----- DOI ------ */
					IF (isset($cic[$weeku[0]])==FALSE){ $cic[$weeku[0]]=0;}
					IF (isset($cic[$weeku[1]])==FALSE){ $cic[$weeku[1]]=0;}
					IF($Msoc[$weeku[0]]>0){
						$DoIc[$weeku[0]]=$cic[$weeku[0]]/($Msoc[$weeku[0]]/7);
					}
					ELSE{ $DoIc[$weeku[0]]=0; }
					IF($Msoc[$weeku[1]]>0){
						$DoIc[$weeku[1]]=$cic[$weeku[1]]/($Msoc[$weeku[1]]/7);
					}
					ELSE{ $DoIc[$weeku[1]]=0; }

			
			/* ----- Freshness ------*/
				$u=0;
				$query = "SELECT SUM(CI) AS CIA, IdWeek FROM DealerPSI, Compte, Produit WHERE Produit.Id = DealerPSI.Idproduit AND Produit.Division='CS'  ";
				$query .= "AND Compte.New_Num_Client=DealerPSI.New_Num_Client ";
				$query .= "AND Compte.New_Num_Client='".$compte."' AND Quarter = '".$quarter[0]."' AND (";
				For ($u=0; $u<2; $u++){
						if ($u!=0){ $query.= " OR ";}
						$query .=" IdWeek='".$weeku[$u]."' ";
					}
				$query .= ") GROUP BY IdWeek ORDER BY IdWeek DESC";
				$do = odbc_do ($connectbase, $query); 
				while(odbc_fetch_row ($do)){
					$frc[odbc_result($do,'IdWeek')]=odbc_result($do,'CIA');
				}
				IF (isset($frc[$weeku[0]])==TRUE){
					$Freshc[$weeku[0]]= $frc[$weeku[0]]*100/$cic[$weeku[0]];
				}
				ELSE {
				$Freshc[$weeku[0]]=0;
				}
				
			/* ----- Weight ------*/
				$u=0;
				$query = "SELECT IdWeek, MAX(CI) AS SCIB FROM DealerPSI, Compte, Produit WHERE Compte.New_Num_Client=DealerPSI.New_Num_Client AND DealerPSI.IdProduit = Produit.Id AND Produit.Division='CS' ";
				$query .= "AND Compte.New_Num_Client='".$compte."' AND (";
				For ($u=0; $u<2; $u++){
						if ($u!=0){ $query.= " OR ";}
						$query .=" IdWeek='".$weeku[$u]."' ";
					}
				$query .= ") GROUP BY IdWeek ORDER BY IdWeek DESC";
				$do = odbc_do ($connectbase, $query); 
				while(odbc_fetch_row ($do)){
					$repc[odbc_result($do,'IdWeek')] = odbc_result($do,'SCIB');
				}
				$RCIc[$weeku[0]]=$repc[$weeku[0]]*100/$cic[$weeku[0]];
					
							
	/**************************************************/
	$SeuilCI="#FFFFFF";
	$SeuilSO="#FFFFFF";
	$SeuilDOI="#FFFFFF";
	$SeuilF="#FFFFFF";
	$SeuilR="#FFFFFF";
	
	/**************************************************/
	/**************** USER + USER n+1 **********************/	
	$i=0;
	$query = "SELECT * FROM [User], CompteUser WHERE CompteUser.IdUser = [User].user_id ";
	$query .= " AND Division = 'CS' AND New_Num_Client = '".$compte."' ";
	
	$do = odbc_do ($connectbase, $query); 
		while(odbc_fetch_row ($do)){
		$mail_U_BTC[$i] = odbc_result($do,'user_mail'); /* Mail du User */
		$User_H_BTC[$i] = odbc_result($do,'user_n1_id');
	$i++;
	}

	
	$a=0;
	$query = "SELECT * FROM [User] WHERE ";
	For ($u=0; $u<$i; $u++){
						if ($u!=0){ $query.= " OR ";}
						$query .=" user_id= '".$User_H_BTC[$u]."' ";
					}	
	$do = odbc_do ($connectbase, $query); 
		while(odbc_fetch_row ($do)){
		$mail_H_BTC[$a] = odbc_result($do,'user_mail'); /* Mail du supérieur Hiérarchique */
		$a++;
	}

	
	$query = "SELECT * FROM [user] WHERE user_id = ".$user_id;
	$do = odbc_do ($connectbase, $query); odbc_fetch_row($do);
	$user_nom = odbc_result($do,'user_nom');
	$user_prenom = odbc_result($do,'user_prenom');
	$user_mail = odbc_result($do,'user_mail');

	
	/***********************************/
	
	$i=1;
	$to = $mail_U_BTC[0];
	WHILE (isset($mail_U_BTC[$i])){
	$to .= ", ".$mail_U_BTC[$i];
	$i++;
	}
	// $to = "aleger@toshiba-tsf.com";
	$from  = $user_mail;
	
	$sujet = "DPSI - SO & CI - ".$weeku[0]." - ".$Name."";

	$contenu = "<html> \n";
	$contenu .= "<HEAD> \n";
	$contenu .= "<STYLE>";
	$contenu .= "BODY { font: 11pt Calibri, sans-serif; }\n";
	$contenu .= "TABLE { PADDING:1px; MARGIN:0px; BORDER:0px; BACKGROUND: #CCCCCC;}\n";
	$contenu .= "TD { font: 10pt Calibri, sans-serif; BACKGROUND: #FFFFFF; }\n";
	$contenu .= "</STYLE>\n";
	$contenu .= "</HEAD> \n";
	$contenu .= "<BODY> \n";
	$contenu .= " <H3>".$Name." - Rapport hebdomadaire de la semaine ".substr ($weeku[0], -2)."</H3>";

		IF ($cic[$weeku[0]]<$S1CI[$NCI] OR $Msoc[$weeku[0]]>$S1SO[$NSO] OR $DoIc[$weeku[0]]<$S1DoI[$NDoI] OR $Freshc[$weeku[0]]>$S1F[$NF] OR $RCIc[$weeku[0]]<$S1R[$NR]){
			$contenu .= "<b> Les Plus </b><BR><BR>";
				IF ($DoIc[$weeku[0]]<$S1DoI[$NDoI]){
					$contenu .= " &nbsp;&nbsp;&#149; Days Of inventory :<font color=green> ".number_format($DoIc[$weeku[0]],0,',',' ')." jours </font><BR>"; 
					$SeuilDOI="#00D824";
				}
				IF ($cic[$weeku[0]]<$S1CI[$NCI]){
					$contenu .= " &nbsp;&nbsp;&#149; Stock :<font color=green> ".number_format($cic[$weeku[0]],0,',',' ')." produits</font><BR>"; 
					$SeuilCI="#00D824"; 
				}
				IF ($Msoc[$weeku[0]]>$S1SO[$NSO]){
					$contenu .= " &nbsp;&nbsp;&#149; Moyenne des ventes des 4 dernières semaines : <font color=green> ".number_format($Msoc[$weeku[0]],0,',',' ')." ";
					$contenu .= "produits par semaine</font><BR>"; 
					$SeuilSO="#00D824";
				}
				IF ($Freshc[$weeku[0]]>$S1F[$NF]){
					$contenu .= " &nbsp;&nbsp;&#149; Freshness : <font color=green>".number_format($Freshc[$weeku[0]],0,',',' ')." %</font><BR>"; 
					$SeuilF="#00D824";
				}
				IF ($RCIc[$weeku[0]]<$S1R[$NR]){
					$contenu .= " &nbsp;&nbsp;&#149; Repartition : <font color=green>".number_format($RCIc[$weeku[0]],0,',',' ')." % </font><BR>"; 
					$SeuilR="#00D824";
				}
		}
		IF ($cic[$weeku[0]]>$S2CI[$NCI] AND $DoIc[$weeku[0]]>$S1DoI[$NDoI] OR $Msoc[$weeku[0]]<$S2SO[$NSO] AND $DoIc[$weeku[0]]>$S1DoI[$NDoI] 
		OR $DoIc[$weeku[0]]>$S2DoI[$NDoI] OR $Freshc[$weeku[0]]<$S2F[$NF] OR $RCIc[$weeku[0]]>$S2R[$NR]){
			$contenu .= "<BR><b> Les Moins </b><BR><BR>";
				IF ($DoIc[$weeku[0]]>$S2DoI[$NDoI]){
					$contenu .= " &nbsp;&nbsp;&#149; Days Of inventory : <font color=red>".number_format($DoIc[$weeku[0]],0,',',' ')." jours</font><BR>"; 
					$SeuilDOI="red";
				}
				IF ($cic[$weeku[0]]>$S2CI[$NCI] AND $DoIc[$weeku[0]]>$S1DoI[$NDoI]){
					$contenu .= " &nbsp;&nbsp;&#149; Stock :<font color=red> ".number_format($cic[$weeku[0]],0,',',' ')." produits</font><BR>"; 
					$SeuilCI="red"; 
				}
				IF ($Msoc[$weeku[0]]<$S2SO[$NSO] AND $DoIc[$weeku[0]]>$S1DoI[$NDoI]){
					$contenu .= " &nbsp;&nbsp;&#149; Moyenne des ventes des 4 dernières semaines :<font color=red> ".number_format($Msoc[$weeku[0]],0,',',' ')." ";
					$contenu .= "produits par semaine</font> <BR>"; 
					$SeuilSO="red";
				}
				IF ($Freshc[$weeku[0]]<$S2F[$NF]){
					$contenu .= " &nbsp;&nbsp;&#149; Freshness :<font color=red> ".number_format($Freshc[$weeku[0]],0,',',' ')." % </font><BR>"; 
					$SeuilF="red";
				}
				IF ($RCIc[$weeku[0]]>$S2R[$NR]){
					$contenu .= " &nbsp;&nbsp;&#149; Repartition : <font color=red> ".number_format($RCIc[$weeku[0]],0,',',' ')." % </font><BR>"; 
					$SeuilR="red";
				}
		}

	$contenu .= "<BR><b>Vue détaillée</b><BR><BR>";	
	$contenu .="<TABLE>";
	$contenu .=	"<TR align=center><TD align=left colspan=3><b> </b></TD><TD colspan=2><b>DoI</b></TD><TD colspan=2><b>CI</b></TD>";
	$contenu .= "<TD colspan=2><b>So M4W</b></TD><TD><b>Freshness</b></TD><TD><b>Weight</b></TD></TR>";
	$contenu .=	"<TR align=center><TD align=left width='90'><b>Code</b></TD><TD align=left width='150'><b>Nom Client</b></TD>";
	$contenu .= "<TD align=left width='85'><b>Channel</b></TD>";
	$contenu .=	"<TD width='60'><b>".substr ($weeku[0], -3)."</b></TD><TD width='60'><b>vs ".substr ($weeku[1], -3)."</b></TD>";
	$contenu .= "<TD width='60'><b>".substr ($weeku[0], -3)."</b></TD><TD width='60'><b>vs ".substr ($weeku[1], -3)."</b></TD>";
	$contenu .=	"<TD width='60'><b>".substr ($weeku[0], -3)."</b></TD><TD width='60'><b>vs ".substr ($weeku[1], -3)."</b></TD>";
	$contenu .=	"<TD width='60'><b>".substr ($weeku[0], -3)."</b></TD><TD width='60'>".substr ($weeku[0], -3)."</b></TD></TR>";
	$contenu .=	"<TR align=right style='font-family:calibri'><TD align=left>".$compte."</a></TD><TD align=left>".$Name."</TD><TD align=left>".$channel."</TD>";
	$contenu .=	"<TD style='background:".$SeuilDOI."'>".number_format($DoIc[$weeku[0]],0,',',' ')."</TD>";
	$contenu .= "<TD>".format0($DoIc[$weeku[0]]-$DoIc[$weeku[1]])."</TD>";
	$contenu .= "<TD style='background:".$SeuilCI."'>".number_format($cic[$weeku[0]],0,',',' ')."</TD>";
	$contenu .=	"<TD>".format0($cic[$weeku[0]]-$cic[$weeku[1]])."</TD>";
	$contenu .= "<TD style='background:".$SeuilSO."'>".number_format($Msoc[$weeku[0]],0,',',' ')."</TD>";
	$contenu .= "<TD>".format0($Msoc[$weeku[0]]-$Msoc[$weeku[1]])."</TD>";
	$contenu .= "<TD style='background:".$SeuilF."'>".number_format($Freshc[$weeku[0]],0,',',' ')." %</TD>";
	$contenu .=	"<TD style='background:".$SeuilR."'>".number_format($RCIc[$weeku[0]],0,',',' ')." %</TD></TR>";
	$contenu .="</TABLE>";	
	$contenu .= "<BR><BR>";
		/********** BAD 10 DOI **********/
	$contenu .= "<TABLE>";
		$query = "SELECT TOP 10 IdProduit, SUM(DPSI1.CI) AS SCI, NomCcial, SKU, Quarter, ";
		$query .= "(SELECT SUM(SO) AS SCO FROM DealerPSI AS DPSI3 WHERE DPSI3.Idproduit = DPSI1.Idproduit AND New_Num_Client='".$compte."' ";
		$query .= "AND (DPSI3.IdWeek = '".$weeku[1]."' OR DPSI3.IdWeek = '".$weeku[2]."' OR DPSI3.IdWeek = '".$weeku[3]."' OR DPSI3.IdWeek = '".$weeku[0]."')) AS SO4, ";
		$query .= "(SUM(DPSI1.CI)*4*7/(SELECT SUM(SO) AS SCO FROM DealerPSI AS DPSI3 WHERE DPSI3.Idproduit = DPSI1.Idproduit AND New_Num_Client='".$compte."' ";
		$query .= "AND (DPSI3.IdWeek = '".$weeku[1]."' OR DPSI3.IdWeek = '".$weeku[2]."' OR DPSI3.IdWeek = '".$weeku[3]."' OR DPSI3.IdWeek = '".$weeku[0]."') ";
		$query .= "HAVING SUM(SO) > 0))  AS TOTAL ";
		$query .= "FROM DealerPSI AS DPSI1, Compte AS C1, Produit ";
		$query .= "WHERE DPSI1.New_Num_Client = C1.New_Num_Client ";
		$query .= "AND DPSI1.IdProduit = Produit.Id ";
		$query .= "AND DPSI1.IdWeek = '".$weeku[0]."' AND C1.New_Num_Client='".$compte."' AND CI>0 ";
		$query .= "GROUP BY Idproduit, NomCcial, SKU, Quarter ORDER BY TOTAL DESC, SCI DESC";
			
	$contenu .= "<TR><TD colspan=5 align=left><b>Bad 10 DoI</b></TD><TD colspan=6 align=center><b>CI</b></TD></TR>";
	$contenu .= "<TR align=left><TD width='160'><b>Nom Client</b></TD><TD width='150'><b>SKU</b></TD><TD width='70'><b>Quarter</b></TD>";
	$contenu .= "<TD width='70' align=center><b>DoI</b></TD><TD width='70' align=center><b>So M4W</b></TD>";
	$contenu .= "<TD width='70' align=center><b>".substr ($weeku[0], -5)."</b></TD><TD width='70' align=center><b>".substr ($uweek[1], -5)."</b></TD>";
	$contenu .= "<TD width='70' align=center><b>".substr ($uweek[3], -5)."</b></TD><TD width='70' align=center><b>".substr ($uweek[5], -5)."</b></TD>";
	$contenu .= "<TD width='70' align=center><b>".substr ($uweek[7], -5)."</b></TD><TD width='70' align=center><b>".substr ($uweek[9], -5)."</b></TD>";
	$contenu .= "</TR>";
						
			$do = odbc_do ($connectbase, $query);
			echo odbc_errormsg();
			while(odbc_fetch_row ($do)){

			IF(odbc_result($do,'SO4')>0){
			$DoIa=odbc_result($do,'SCI')/(((odbc_result($do,'SO4')/4)/7));
			}
			ELSE {
			$DoIa="NA";
			}
			
			IF (odbc_result($do,'Quarter')==$quarter[0]){
				$ColorQ="<font style='color:RED'>".odbc_result($do,'Quarter')."</font>";
			}
			ELSE IF (odbc_result($do,'Quarter')==$quarter[1]){
				$ColorQ="<font style='background:#FA8A1A'>".odbc_result($do,'Quarter')."</font>";
			}
			ELSE {
				$ColorQ="<font style='background:RED'>".odbc_result($do,'Quarter')."</font>";
			}
					
			
			
			$SCI=odbc_result($do,'SCI');
			
	$contenu .= "<TR align=right><TD align=left>".odbc_result($do,'NomCcial')."</TD>";
	$contenu .= "<TD align=left><a href='http://dsinterface.tsf.teda/prd/prd_view.php?id=".odbc_result($do,'IdProduit')."'>".odbc_result($do,'Sku')."</a></TD>";
	$contenu .= "<TD align=left>".$ColorQ."</TD><TD>".format1($DoIa)."</TD>";
	



	$contenu .= "<TD>".str_replace('.',',',(odbc_result($do,'SO4')/4))."</TD>"; 
	
	
	$contenu .= "<TD>".odbc_result($do,'SCI')."</TD>";
	
			IF (($SCI-odbc_result($do,'SO4')/4-odbc_result($do,'SO4')/4)<0){
				$SCI=0;
			}
			ELSE {
				$SCI=$SCI-odbc_result($do,'SO4')/4-odbc_result($do,'SO4')/4;
			}
			$contenu .= "<TD>".str_replace('.',',',$SCI)."</TD>"; 
		
			
			IF (($SCI-odbc_result($do,'SO4')/4-odbc_result($do,'SO4')/4)<0){
				$SCI=0;
			}
			ELSE {
				$SCI=$SCI-odbc_result($do,'SO4')/4-odbc_result($do,'SO4')/4;
			}
			$contenu .= "<TD>".str_replace('.',',',$SCI)."</TD>"; 
			
			IF (($SCI-odbc_result($do,'SO4')/4-odbc_result($do,'SO4')/4)<0){
				$SCI=0;
			}
			ELSE {
				$SCI=$SCI-odbc_result($do,'SO4')/4-odbc_result($do,'SO4')/4;
			}
			$contenu .= "<TD>".str_replace('.',',',$SCI)."</TD>"; 
			
			IF (($SCI-odbc_result($do,'SO4')/4-odbc_result($do,'SO4')/4)<0){
				$SCI=0;
			}
			ELSE {
				$SCI=$SCI-odbc_result($do,'SO4')/4-odbc_result($do,'SO4')/4;
			}
			$contenu .= "<TD>".str_replace('.',',',$SCI)."</TD>"; 
			
			IF (($SCI-odbc_result($do,'SO4')/4-odbc_result($do,'SO4')/4)<0){
				$SCI=0;
			}
			ELSE {
				$SCI=$SCI-odbc_result($do,'SO4')/4-odbc_result($do,'SO4')/4;
			}
			$contenu .= "<TD>".str_replace('.',',',$SCI)."</TD>"; 
			
			
			
	$contenu .= "</TR>";
	}
	$contenu .= "</TABLE>";
	$contenu .= "<BR><BR>";
	
	$contenu .= "Pour retrouver l'historique du compte sur <a href='".$serveur_dsi."/ventes/dpsi_indicec.php?compte=".$compte."'>DS Interface</a><BR>";	
	$contenu .= "Pour retrouver l'historique de tous les clients TFR - DS sur <a href='".$serveur_dsi."/ventes/dpsi_indice.php'>Stats – Dealer Channel Inventory</a>";	
	$contenu .= "<BR><BR>";
	$contenu .= "<b>Définitions des seuils par indicateur (Rouge/Vert) :</b><br><BR>";
	$contenu .="<TABLE>";
	$contenu .= "<TR align=right><TD align=left width='80'>DoI :</TD>";
	$contenu .= "<TD width='60' style='background:#00D824'> < ".number_format($S1DoI[$NDoI],0,',',' ')."</TD>";
	$contenu .= "<TD width='60' style='background:RED'> > ".number_format($S2DoI[$NDoI],0,',',' ')."</TD></TR>";
	$contenu .= "<TR align=right><TD align=left>CI :</TD>";
	$contenu .= "<TD style='background:#00D824'> < ".number_format($S1CI[$NCI],0,',',' ')."</TD>";
	$contenu .= "<TD style='background:RED'> > ".number_format($S2CI[$NCI],0,',',' ')."</TD></TR>";
	$contenu .= "<TR align=right><TD align=left>So4w :</TD>";
	$contenu .= "<TD style='background:#00D824'> > ".number_format($S1SO[$NSO],0,',',' ')."</TD>";
	$contenu .= "<TD style='background:RED'> < ".number_format($S2SO[$NSO],0,',',' ')."</TD></TR>";
	$contenu .= "<TR align=right><TD align=left>Freshness :</TD>";
	$contenu .= "<TD style='background:#00D824'> > ".number_format($S1F[$NF],0,',',' ')."%</TD>";
	$contenu .= "<TD style='background:RED'> < ".number_format($S2F[$NF],0,',',' ')."%</TD></TR>";
	$contenu .= "<TR align=right><TD align=left>Repartition :</TD>";
	$contenu .= "<TD style='background:#00D824'> < ".number_format($S1R[$NR],0,',',' ')."%</TD>";
	$contenu .= "<TD style='background:RED'> > ".number_format($S2R[$NR],0,',',' ')."%</TD></TR>";
	$contenu .="</table>";
	
	$contenu .= '<br/><br/>Cordialement.<br/><br/>'.$user_prenom.'&nbsp;'.$user_nom.'<br/>';
	$contenu .= '<b>TOSHIBA France</b><br/>Succursale de TOSHIBA Europe GmbH <br/>Business Process Departement';
	
	
	$contenu .= "</body> \n";
	$contenu .= "</HTML> \n";

	$headers  = "MIME-Version: 1.0 \n";
	$headers .= "Content-Transfer-Encoding: 8bit \n";
	$headers .= "Content-type: text/html; charset=iso-8859-1 \n";
	$j=1;
	$headers .= "Cc: ".$mail_H_BTC[0];
		WHILE (isset($mail_H_BTC[$j])){
	$headers .= ", ".$mail_H_BTC[$j];
	$j++;
	}
	$headers .= " \n";
	$headers .= "From: ".$from."  \n";

	
	$verif_envoi_mail = TRUE;
	$verif_envoi_mail = @mail ($to, $sujet, $contenu, $headers);

	echo "<DIV class=z6><DIV class=content>";
	if ($verif_envoi_mail == FALSE){ echo " ### Verification Envoi du Mail=".$verif_envoi_mail." - Erreur envoi mail <br> \n";}
	else { echo " *** Mail envoy&eacute; avec succ&egrave;s de ".$from." vers ".$to." avec comme sujet : </BR> ".$sujet." \n";}

	echo "</DIV></DIV>";
	
	// echo "<DIV class=z2><DIV class=content>";
	// echo $contenu;
	// echo "</DIV></DIV>";
	
	echo "<DIV class=z1><DIV class=content>";
	echo "<a href='dpsi_mailBTC.php'>Retour</a>";
	echo "</DIV></DIV>";

include("../conf/_conn_off.php");
} INCLUDE('../conf/basdepage.php'); ?>
	

<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

