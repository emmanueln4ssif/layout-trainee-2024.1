function Excluir() {
    let text = "Tem certeza que deseja excluir o usuário?";
    if (confirm(text) == true) {
      text = "Excluido com sucesso";
      window.location.href ='#';
    } 
  }
  funtion