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
        $senha = $usuariodados['senha_user'];
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
    <link rel="stylesheet" href="cadastro.css" />
    <title>editar dados do cadastro</title>
  </head>
  <br>
    <header>
      <img src="" alt="" />
    </header>
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
    <nav class= "navbar">
      <?php include 'navbar.php'; ?>
      </nav>
      
      <div class="conteiner">

      
      <form
        name="form_cadastro"
        method="POST"
        action="cadastro.php"
        id="form_cadastro"
        onsubmit="return btnSendOnClick();"
        enctype="multipart/form-data"
      >
        Nome: <input type="text" name="txtName" id="txtName" placeholder="Insira seu nome" /><br />
        CPF <input type="text" name="txtCPF" id="txtCPF" placeholder="Insira seu CPF (Apenas números)" /><br />
        Data de nascimento <input type="text" name="txtNasc" id="txtNasc" placeholder="(AAAA-MM-DD)"><br />
        Sexo:
        <div style="display: flex; gap: 10px;">
          <label>
            <input type="radio" name="optGender" value="feminino" id="feminino"/> Feminino
          </label>
          <label>
            <input type="radio" name="optGender" value="masculino" id="masculino" /> Masculino
          </label>
        </div><br />
        E-mail <input type="text" name="txtEmail" id="txtEmail" placeholder="Insira seu e-mail"/><br />
        País <input type="text" name="end_pais" id="end_pais" placeholder="Insira o país que você mora"/><br />
        <label for="estado">Estado</label>
        <select id="end_estado" name="end_estado" required>
          <option value="0" disabled selected>Selecione o estado:</option>
          <option value="ac">AC</option>
          <option value="al">AL</option>
          <option value="am">AM</option>
          <option value="ap">AP</option>
          <option value="ba">BA</option>
          <option value="ce">CE</option>
          <option value="df">DF</option>
          <option value="es">ES</option>
          <option value="go">GO</option>
          <option value="ma">MA</option>
          <option value="mg">MG</option>
          <option value="ms">MS</option>
          <option value="mt">MT</option>
          <option value="pa">PA</option>
          <option value="pb">PB</option>
          <option value="pe">PE</option>
          <option value="pi">PI</option>
          <option value="pr">PR</option>
          <option value="rj">RJ</option>
          <option value="rn">RN</option>
          <option value="ro">RO</option>
          <option value="rr">RR</option>
          <option value="rs">RS</option>
          <option value="sc">SC</option>
          <option value="se">SE</option>
          <option value="sp">SP</option>
          <option value="to">TO</option></select
        ><br />
        Cidade <input type="text" name="end_cidade" id="end_cidade" placeholder="Insira a cidade que você mora" /><br />
        Telefone <input type="text" name="txtTel" id="txtTel" placeholder="Insira seu telefone (Apenas números)" /><br />
        Animal Favorito <input type="text" name="txtAF" id="txtAF" /><br />
        Nome de usuário <input type="text" name="txtNU" id="txtNU" placeholder="Insira o nome que será exibido para os outros usuários" /><br />
        Senha <input type="text" name="txtSenha" id="txtSenha" placeholder="Insira sua senha" /><br />
        Confirmar sua senha <input type="text" placeholder="Confirme sua senha">
        <input type="submit" value="Enviar" />
        <input type="reset" value="Limpar" />
      </form>
    </div>
  </body>

  <script>
    //arumar o validacao(sem mexer no submit para nao ferrar o cadastro.php)
    const txtName = document.getElementById("txtName");
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
      return true;
    }
    function isCPF(txtcpf) {
        const cpf = txtcpf.value;
        const re = /^\d{11}$/;
        return re.test(cpf)
      
    }

    function isEmail(txtemail) {
        const email =  txtemail.value;
      const re = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
      return re.test(email);
    }
    // criar funcao regex para data de nacimento
  </script>
</html>