
 var inserirNaTabela = function () {
        
        //Pegando os dados do input

        let largada = document.getElementById("largada").value
        let nome = document.getElementById("nome").value
        let tempo = document.getElementById("tempo").value
        
        //Inserindo os dados na tabela
        let tabelaBody = document.getElementById("corpo")
        
        //Criando elemento e colocando na tabela
        let tr = document.createElement("tr")

        let tdLargada = document.createElement("td")
        let tdNome = document.createElement("td")
        let tdTempo = document.createElement("td")
        let tdGanhador = document.createElement("td")
        
        tdLargada.textContent = largada
        tdNome.textContent = nome
        tdTempo.textContent = tempo
        tdGanhador.textContent = "?"
        
        tr.appendChild(tdLargada)
        tr.appendChild(tdNome)
        tr.appendChild(tdTempo)
        tr.appendChild(tdGanhador)
        
        tabelaBody.appendChild(tr)
        
        //Limpando os inputs A cada click no inserir o input fica vazio
        // pronto para inserir um novo jogador
        document.getElementById("largada").value = ""
        document.getElementById("nome").value = ""
        document.getElementById("tempo").value = ""
      }
      
      var ordenarTabela = function () {
        // Passo 1 Pegar todas as linhas da tabelaBody
        let corpoTabela = document.getElementById("corpo")
        let linhas = corpoTabela.getElementsByTagName("tr")
        let arrayJogadores = []
        
        //Aqui ja vai comecar um for para gera o array de JOGADORES
        for(let i = 0; i < linhas.length; i++) {
          let tds = linhas[i].getElementsByTagName("td")
          arrayJogadores.push({nome: tds[0].textContent, tempo: tds[1].textContent})
        }
        
        arrayJogadores.sort(function(obj1, obj2){
          return obj1.tempo - obj2.tempo
        })
        
        // Limpar a tabela antes de inserir as novas linhas
         let tabelaBody = document.getElementById("corpo")
        tabelaBody.innerHTML = ""
        
        
        // Inserir os novos dados na tabela depois que a tabela foi Limpando
        for(let i = 0; i < arrayJogadores.length; i++) {
          //Criando elemento e colocando na tabela
          let tr = document.createElement("tr")
          
          // Criando as tds
          let tdLargada = document.createElement("td")
          let tdNome = document.createElement("td")
          let tdTempo = document.createElement("td")
          let tdGanhador = document.createElement("td")
          
          //Colocando conteudo nas tds

          tdLargada.textContent = arrayJogadores[i].nome
          tdNome.textContent = arrayJogadores[i].nome
          tdTempo.textContent = arrayJogadores[i].tempo
          tdGanhador.textContent = i == 0 ? "Sim" : "Não"
          tdGanhador.style.backgroundColor = i == 0 ? "green" : "red"
          tdGanhador.style.color = "white"
          
          //Colocando as tds dentro do tr
          tr.appendChild(tdLargada)
          tr.appendChild(tdNome)
          tr.appendChild(tdTempo)
          tr.appendChild(tdGanhador)
          
          //Inserindo linha por linha na tabela ordenadamente
          tabelaBody.appendChild(tr)
        }
      }
      
      //limpado tabela
      function limparTabela() {
        let tabelaBody = document.getElementById("corpo").innerHTML = ""
      }