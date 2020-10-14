<html>
<body bgcolor="#CCCCCC">
<font size="5"><b>Ajout d'un add-on dans la base de donn&eacute;es </b></font> 
<form action="enregistrementDB.php" method="post" name="post">
  <table width="20" border="1" cellspacing="5" cellpadding="0" bordercolor="#000000">
    <tr>
      <td>
        <table width="770" cellspacing="2" cellpadding="2" height="240" bgcolor="#99CCFF">
          <tr> 
      <td width="380">Type d'engin 
        <select name="type" tabindex="1">
          <option value="0">Locomotive à vapeur</option>
          <option value="1">Locomotive électrique</option>
          <option value="2">Locomotive thermique</option>
          <option value="3">Autorail</option>
          <option value="4">Automotrice</option>
          <option value="5">Voiture</option>
          <option value="6">Wagon</option>
        </select>
      </td>
      <td width="388">Nationalité 
        <select name="nationalite" tabindex="2">
          <option value="0">France</option>
        </select>
      </td>
    </tr>
    <tr> 
      <td colspan="2">Add-on en t&eacute;l&eacute;chargement sur Simtrain-fr.org 
        <input type="checkbox" name="simtrain"  tabindex="3" />
      </td>
    </tr>
    <tr> 
      <td colspan="2">Nom de l'add-on : 
        <input type="text" name="nom" size="45" maxlength="60" style="width:450px" tabindex="4" value="" />
      </td>
    </tr>
    <tr> 
      <td colspan="2">Description de l'add-on :<br>
        <textarea name="description" rows="15" cols="120" wrap="virtual" tabindex="5" class="post" onSelect="storeCaret(this);" onClick="storeCaret(this);" onKeyUp="storeCaret(this);"></textarea>
      </td>
    </tr>
    <tr> 
      <td colspan="2">URL de la vignette 
        <input type="text" name="url_image" size="45" maxlength="255" style="width:450px; font-size:10px" tabindex="6" value="" />
      </td>
    </tr>
    <tr> 
      <td colspan="2">URL de téléchargement
        <input type="text" name="url_download" size="45" maxlength="255" style="width:450px; font-size:10px" tabindex="7" value="" />
      </td>
    </tr>
    <tr> 
      <td colspan="2">Taille de l'add-on 
        <input type="text" name="taille" size="45" maxlength="60" style="width:450px" tabindex="8" value="" />
      </td>
    </tr>
    <tr> 
      <td colspan="2">Auteur 
        <input type="text" name="auteur" size="45" maxlength="255" style="width:450px; font-size:10px" tabindex="9" value="" />
      </td>
    </tr>
  </table>
  </td>
    </tr>
  </table>
  <p> <!--<input type="hidden" name="mode" value="" /><input type="hidden" name="t" value="" />--> 
    <input type="submit" accesskey="s" tabindex="10" name="post" value="Envoyer" />
  </p>

</form>

</body>
</html>
