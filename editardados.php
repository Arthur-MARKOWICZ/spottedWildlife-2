<?php
    include('conn.php');
    include('protect.php');
    $id = $_SESSION['id'];
    
    $sqlselctdados ="SELECT * FROM usuarios WHERE usuarios_id = $id";
    $result = $conn->query($sqlselctdados);
    while($usuariodados = mysqli_fetch_assoc($result)){
        $nome = $usuariodados['nome'];
        $cpf = $usuariodados['cpf'];
        $email = $usuariodados['email_pessoal'];
        $senha = $_SESSION['senha'];
        $dataNasc = $usuariodados['data_nasc'];
        $telefone = $usuariodados['telefone'];
        $pais = $usuariodados['end_pais'];
        $estado = $usuariodados['end_estado'];
        $animalFav = $usuariodados['animal_fav'];
        $nome_user = $usuariodados['nome_user'];
        $cidade = $usuariodados['end_cidade'];
        $sexo = $usuariodados['sexo'];

        
    }

?>
<!DOCTYPE html>
<html lang="pt-BR">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="editardados.css" />
    <link rel="stylesheet" href="navbar2.css" />
    <title>editar dados do cadastro</title>
  </head>
  <br>
  <?php include 'logo.php'; ?><br><br>
    <nav class= "navbar">
          <?php include 'navbar.php'; ?>
      </nav>
    <h1>Editar dados do cadastro</h1>
  <div vw class="enabled">
    <div vw-access-button class="active"></div>
    <div vw-plugin-wrapper>
      <div class="vw-plugin-top-wrapper"></div>
    </div>
  </div>
  <script src="https://vlibras.gov.br/app/vlibras-plugin.js"></script>
  <script>
    new window.VLibras.Widget('https://vlibras.gov.br/app');
  </script>
   
      


      <div class="conteiner">

      
      <form
        name="form_cadastro"
        method="POST"
        action="salvarEditar.php"
        id="form_cadastro"
        onsubmit="return btnSendOnClick();"
        enctype="multipart/form-data"
      >
        Nome: <input type="text" name="txtName" id="txtName" placeholder="Insira seu nome" value ="<?php echo "$nome" ?>" /><br />
        CPF <input type="text" name="txtCPF" id="txtCPF" placeholder="Insira seu CPF (Apenas números) "value ="<?php echo "$cpf" ?> "/><br />
        Data de nascimento <input type="text" name="txtNasc" id="txtNasc" placeholder="(AAAA-MM-DD)" value ="<?php echo "$dataNasc" ?>"><br />
        Sexo:
        <div style="display: flex; gap: 10px;">
          <label>
          <input type="radio" name="optGender" value="feminino" id="feminino" <?php if ($sexo == 'feminino') echo 'checked'; ?> /> Feminino
          <input type="radio" name="optGender" value="masculino" id="masculino" <?php if ($sexo == 'masculino') echo 'checked'; ?> /> Masculino

          </label>
        </div><br />
        E-mail <input type="text" name="txtEmail" id="txtEmail" placeholder="Insira seu e-mail"value ="<?php echo "$email" ?> "/><br />
        País <input type="text" name="end_pais" id="end_pais" placeholder="Insira o país que você mora"value ="<?php echo "$pais" ?> "/><br />
        <label for="estado">Estado</label>
        <select id="end_estado" name="end_estado" required>
            <option value="0" disabled <?php if (!$estado) echo 'selected'; ?>>Selecione o estado:</option>
            <option value="ac" <?php if ($estado == 'ac') echo 'selected'; ?>>AC</option>
            <option value="al" <?php if ($estado == 'al') echo 'selected'; ?>>AL</option>
            <option value="am" <?php if ($estado == 'am') echo 'selected'; ?>>AM</option>
            <option value="ap" <?php if ($estado == 'ap') echo 'selected'; ?>>AP</option>
            <option value="ba" <?php if ($estado == 'ba') echo 'selected'; ?>>BA</option>
            <option value="ce" <?php if ($estado == 'ce') echo 'selected'; ?>>CE</option>
            <option value="df" <?php if ($estado == 'df') echo 'selected'; ?>>DF</option>
            <option value="es" <?php if ($estado == 'es') echo 'selected'; ?>>ES</option>
            <option value="go" <?php if ($estado == 'go') echo 'selected'; ?>>GO</option>
            <option value="ma" <?php if ($estado == 'ma') echo 'selected'; ?>>MA</option>
            <option value="mg" <?php if ($estado == 'mg') echo 'selected'; ?>>MG</option>
            <option value="ms" <?php if ($estado == 'ms') echo 'selected'; ?>>MS</option>
            <option value="mt" <?php if ($estado == 'mt') echo 'selected'; ?>>MT</option>
            <option value="pa" <?php if ($estado == 'pa') echo 'selected'; ?>>PA</option>
            <option value="pb" <?php if ($estado == 'pb') echo 'selected'; ?>>PB</option>
            <option value="pe" <?php if ($estado == 'pe') echo 'selected'; ?>>PE</option>
            <option value="pi" <?php if ($estado == 'pi') echo 'selected'; ?>>PI</option>
            <option value="pr" <?php if ($estado == 'pr') echo 'selected'; ?>>PR</option>
            <option value="rj" <?php if ($estado == 'rj') echo 'selected'; ?>>RJ</option>
            <option value="rn" <?php if ($estado == 'rn') echo 'selected'; ?>>RN</option>
            <option value="ro" <?php if ($estado == 'ro') echo 'selected'; ?>>RO</option>
            <option value="rr" <?php if ($estado == 'rr') echo 'selected'; ?>>RR</option>
            <option value="rs" <?php if ($estado == 'rs') echo 'selected'; ?>>RS</option>
            <option value="sc" <?php if ($estado == 'sc') echo 'selected'; ?>>SC</option>
            <option value="se" <?php if ($estado == 'se') echo 'selected'; ?>>SE</option>
            <option value="sp" <?php if ($estado == 'sp') echo 'selected'; ?>>SP</option>
            <option value="to" <?php if ($estado == 'to') echo 'selected'; ?>>TO</option>
        </select>
        <br />
        Cidade <input type="text" name="end_cidade" id="end_cidade" placeholder="Insira a cidade que você mora"value ="<?php echo "$cidade" ?> " /><br />
        Telefone <input type="text" name="txtTel" id="txtTel" placeholder="Insira seu telefone (Apenas números)"value ="<?php echo "$telefone" ?> " /><br />
        Animal Favorito <input type="text" name="txtAF" id="txtAF" value ="<?php echo "$animalFav" ?> "/><br />
        Nome de usuário <input type="text" name="txtNU" id="txtNU" placeholder="Insira o nome que será exibido para os outros usuários" value ="<?php echo "$nome_user" ?> "/><br />
        Senha: <input type="text" name="txtSenha" id="txtSenha" placeholder="Insira sua senha" value="<?php echo htmlspecialchars($senha); ?>" />


        <br />
        Confirmar sua senha <input type="text" id="confsenha" placeholder="Confirme sua senha" >
        <input type="submit" value="Enviar" />
        <input type="reset" value="Limpar" />
      </form>
    </div>
  </body>

  <script>
    const txtName = document.getElementById("txtName");
    const confsenha = document.getElementById("confsenha");
    const txtCPF = document.getElementById("txtCPF");
    const dataNasc = document.getElementById("txtNasc");
    const cboGender = document.getElementById("optGender");
    const txtEmail = document.getElementById("txtEmail");
    const end_pais = document.getElementById("end_pais");
    const end_estado = document.getElementById("end_estado");
    const end_cidade = document.getElementById("end_cidade");
    const txtTel = document.getElementById("txtTel");
    const AnimalFav = document.getElementById("txtAF");
    const NomeUser = document.getElementById("txtNU");
    const txtSenha = document.getElementById("txtSenha");

    function btnSendOnClick() {
      if (txtName.value === "") {
        alert("Preenchimento obrigatório: Nome");
        txtName.focus();
        return false;
      }
      if (txtCPF.value === "") {
        alert("Preenchimento obrigatório: CPF");
        txtCPF.focus();
        return false;
      }
      if (dataNasc.value === "") {
        alert("Preenchimento obrigatório: Data de nascimento");
        dataNasc.focus();
        return false;
      }
      if (!document.querySelector('input[name="optGender"]:checked')) {
        alert("Preenchimento obrigatório: Sexo");
        return false;
      }
      if (txtEmail.value === "") {
        alert("Preenchimento obrigatório: E-mail");
        txtEmail.focus();
        return false;
      }
      if (end_pais.value === "") {
        alert("Preenchimento obrigatório: País");
        end_pais.focus();
        return false;
      }
      if (end_estado.value === "0") {
        alert("Preenchimento obrigatório: Estado");
        end_estado.focus();
        return false;
      }
      if (end_cidade.value === "") {
        alert("Preenchimento obrigatório: Cidade");
        end_cidade.focus();
        return false;
      }
      if (txtTel.value === "") {
        alert("Preenchimento obrigatório: Telefone");
        txtTel.focus();
        return false;
      }
      if (NomeUser.value === "") {
        alert("Preenchimento obrigatório: Nome de usuário");
        NomeUser.focus();
        return false;
      }
      if (txtSenha.value === "") {
        alert("Preenchimento obrigatório: Senha");
        txtSenha.focus();
        return false;
      }
      if(txtSenha.value !== confsenha.value){
        alert("confirmar senha e senha diferentes");
        confsenha.focus();
        return false;
      }
      if (!isCPF(txtCPF)) {
        alert("O CPF está incorreto, por favor insira um CPF válido.");
        txtCPF.focus();
        return false;
      }
      if (!isEmail(txtEmail)) {
        alert("O e-mail está incorreto, por favor insira um e-mail válido.");
        txtEmail.focus();
        return false;
      }
      if (!isDataNasc(dataNasc)) {
        alert("Data de nascimento incorreta. Por favor, use o formato AAAA-MM-DD.");
        dataNasc.focus();
    return false;
}

      return true;
    }
    function isCPF(txtcpf) {
        const cpf = txtcpf.value.trim();
        const re = /^\d{11}$/;
        return re.test(cpf)
      
    }

    function isEmail(txtEmail) {
      const email =  txtEmail.value.trim();
      const re = /^[^\s@]+@[^\s@]+\.[^\s@]{2,}$/;
      return re.test(email);
    }
    function isDataNasc(txtNasc) {
    const data = txtNasc.value;
    const re = /^\d{4}-\d{2}-\d{2}$/; 
    return re.test(data);
}

  </script>
</html>