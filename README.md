# Projeto: Gestor de Presença com Raspberry Pi - ECOP11A

## Descrição do Projeto

Este projeto tem como objetivo o desenvolvimento de um sistema de gestão de presença utilizando uma Raspberry Pi como ponto de acesso WiFi.

Os alunos se conectam à rede WiFi criada pela Raspberry e, ao acessar a internet, precisam preencher um formulário com **Nome** e **Matrícula** para registrar sua presença.

Após a presença ser registrada, o aluno tem acesso à internet.

Além disso, foi implementado um painel restrito ao professor, com acesso por login e senha, para baixar a lista de presença.

---

## Tecnologias e Ferramentas Utilizadas

- Raspberry Pi 3 Model B+
- Raspberry Pi OS Lite
- Apache + PHP
- hostapd (Access Point)
- dnsmasq (DHCP)
- SSH com chave pública
- Git + GitHub
- HTML + CSS + PHP

---

## Configurações Realizadas na Raspberry Pi

- Instalação do Raspberry Pi OS
- Configuração de rede WiFi como Access Point
- Configuração de servidor DHCP com dnsmasq
- Servidor Apache + PHP para o sistema web
- Acesso remoto via SSH com chave pública (sem senha)
- Sincronização de código com repositório GitHub

---

## Nome da Rede WiFi (SSID) e Senha

- **SSID:** `Event Horizon`
- **Senha:** `singularity`

---

## Fluxo do Sistema

1. Aluno conecta à rede `Event Horizon`
2. Ao tentar navegar, é redirecionado para o portal de presença.
3. Preenche **Nome** e **Matrícula**.
4. Se matrícula for válida, presença é registrada.
5. O professor pode acessar o painel restrito.

---

## Credenciais de Acesso do Professor (Painel.php)

- **Nome:** `admin`
- **Matrícula:** `0000000000`

Ao digitar esses dados no formulário principal, o professor é redirecionado automaticamente para o painel, onde poderá fazer o download da lista de presença.

---

## Estrutura de Arquivos

- `index.html` → Formulário de presença
- `save.php` → Registro das presenças
- `painel.php` → Área restrita do professor
- `download.php` → Script para baixar a lista de presença
- `presencas.txt` → Arquivo onde as presenças ficam salvas
- `.gitignore` → Ignorando arquivos desnecessários para o Git
- `LICENSE` → Licença MIT
- `README.md` → Este arquivo

---

## Observações Finais

- O bloqueio real de acesso à internet para quem não preenche o formulário ainda não foi implementado.
- O sistema registra **Nome**, **Matrícula**, **Data/Hora de Entrada**, **IP**, **MAC** e **Status (Conectado/Desconectado)**.

---

> Projeto desenvolvido por Ana Cristina Meira para a disciplina de **ECOP11A - Engenharia de Controle e Automação** ❤️

