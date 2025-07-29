<head>
    <style>
        .table-striped td,
        /* Modificação na tabela de alunos*/
        .table-striped th {
            padding-top: 15px;
            padding-bottom: 15px;
        }

        .morris-hover {
            /* Este estilo é referente as informações que aparecem no GRÁFICO DE BARRAS!!! */
            position: absolute !important;
            z-index: 9999;
            background-color: black;
            border: 2px white;
            background-color: rgba(0, 0, 0, 0.8) !important;
            /* fundo preto semi-transparente */
            border: 1px solid #ccc !important;
            /* borda cinza */
            color: #fff !important;
            /* texto branco */
            padding: 8px 12px !important;
            /* espaçamento interno */
            border-radius: 4px !important;
            /* cantos arredondados */
            font-size: 14px !important;
            white-space: nowrap !important;
        }

        .card-body {
            display: flex;
            flex-direction: column;
        }

        #my-awesome-dropzone {
            padding-top: 70%;
            position: relative;
        }

        #my-awesome-dropzone .dz-message {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .file-upload-wrapper {
            margin-top: auto;
            /* empurra para o final do card-body */
        }
    </style>
</head>

<div class="content-wrapper">
    <div class="row">
        <div class="col-md-4 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title" style="text-align: center">Estatística do Almoço</h4>
                    <div class="position-relative">
                        <div class="daoughnutchart-wrapper">
                            <canvas id="transaction-history" class="transaction-chart"></canvas>
                        </div>
                        <div class="custom-value">200 <span>Total de Alunos Previstos</span>
                        </div>
                    </div>
                    <div class="bg-gray-dark d-flex d-md-block d-xl-flex flex-row py-3 px-4 px-md-3 px-xl-4 rounded mt-3">
                        <div class="text-md-center text-xl-left">
                            <h6 class="mb-1">Segunda</h6>
                            <p class="text-muted mb-0">01 Jul 2025, 09:12AM</p>
                        </div>
                        <div class="align-self-center flex-grow text-end text-md-center text-xl-right py-md-2 py-xl-0">
                            <h6 class="font-weight-bold mb-0">150</h6>
                        </div>
                    </div>
                    <div class="bg-gray-dark d-flex d-md-block d-xl-flex flex-row py-3 px-4 px-md-3 px-xl-4 rounded mt-3">
                        <div class="text-md-center text-xl-left">
                            <h6 class="mb-1">Terça</h6>
                            <p class="text-muted mb-0">30 Jun 2025, 09:12AM</p>
                        </div>
                        <div class="align-self-center flex-grow text-end text-md-center text-xl-right py-md-2 py-xl-0">
                            <h6 class="font-weight-bold mb-0">113</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex flex-row justify-content-between">
                        <h4 class="card-title mb-1">Quantidade de Alunos por Turma</h4>
                        <p class="text-muted mb-1">Data de Hoje - 02/07/2025</p>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="preview-list">
                                <div class="preview-item border-bottom">
                                    <div class="preview-thumbnail">
                                        <div class="preview-icon bg-primary">
                                            <i class="mdi mdi-laptop"></i>
                                        </div>
                                    </div>
                                    <div class="preview-item-content d-sm-flex flex-grow">
                                        <div class="flex-grow">
                                            <h6 class="preview-subject">1° B - Informática</h6>
                                            <p class="text-muted mb-0">60 alunos</p>
                                        </div>
                                        <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                                            <p class="text-muted" style="text-align: center;">15 min atrás</p>
                                            <p class="text-muted mb-0">30 servidos, 30 pendente </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="preview-item border-bottom">
                                    <div class="preview-thumbnail">
                                        <div class="preview-icon bg-success">
                                            <i class="mdi mdi-lightbulb-outline"></i>
                                        </div>
                                    </div>
                                    <div class="preview-item-content d-sm-flex flex-grow">
                                        <div class="flex-grow">
                                            <h6 class="preview-subject">2° A - Eletrotécnica</h6>
                                            <p class="text-muted mb-0">60 alunos</p>
                                        </div>
                                        <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                                            <p class="text-muted" style="text-align: center;">2 min atrás</p>
                                            <p class="text-muted mb-0">23 servidos, 37 pendentes </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="preview-item border-bottom">
                                    <div class="preview-thumbnail">
                                        <div class="preview-icon bg-info">
                                            <i class="mdi mdi-test-tube"></i>
                                        </div>
                                    </div>
                                    <div class="preview-item-content d-sm-flex flex-grow">
                                        <div class="flex-grow">
                                            <h6 class="preview-subject">3° A - Química</h6>
                                            <p class="text-muted mb-0">80 alunos</p>
                                        </div>
                                        <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                                            <p class="text-muted" style="text-align: center;">35 min atrás</p>
                                            <p class="text-muted mb-0">75 servidos, 5 pendentes</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="preview-item">
                                    <div class="preview-thumbnail">
                                        <div class="preview-icon bg-warning">
                                            <i class="mdi mdi-wall"></i>
                                        </div>
                                    </div>
                                    <div class="preview-item-content d-sm-flex flex-grow">
                                        <div class="flex-grow">
                                            <h6 class="preview-subject">1° A - Edificações </h6>
                                            <p class="text-muted mb-0">0 alunos </p>
                                        </div>
                                        <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                                            <p class="text-muted" style="text-align: center;">0 min atrás</p>
                                            <p class="text-muted mb-0">0 servidos, 0 pendentes </p>
                                        </div>
                                    </div>
                                </div>
                                <h4 class="card-title" style="padding: 20px 0px 20px 0px;">Turmas com contraturno Hoje </h4>
                                <button type="button" class="btn btn-primary btn-icon-text">
                                    <i class="mdi mdi-laptop"></i> 1° B - Info </button>
                                <button type="button" class="btn btn-info btn-icon-text"> 3° A - Quim <i class="mdi mdi-test-tube"></i>
                                </button>
                                <button type="button" class="btn btn-success btn-icon-text">
                                    <i class="mdi mdi-lightbulb-outline"></i> 2° A - Eletro </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title" style="text-align: center; padding: 10px 0px 10px 0px;">Estatística por Aluno</h4>
                </p>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th> Foto </th>
                                <th> Nome e sobrenome </th>
                                <th> Matrícula </th>
                                <th> Hora </th>
                                <th> Data </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="py-1">
                                    <img src="<?= base_url('assets/images/faces-clipart/pic-1.png') ?>" alt="image">
                                </td>
                                <td> Herman Beck </td>
                                <td> 2025106809087 </td>
                                <td> 11:11 </td>
                                <td> Jun 26, 2025 </td>
                            </tr>
                            <tr>
                                <td class="py-1">
                                    <img src="<?= base_url('assets/images/faces-clipart/pic-2.png') ?>" alt="image">
                                </td>
                                <td> Messsy Adam </td>
                                <td> 2025106809087</td>
                                <td> 11:11 </td>
                                <td> Jun 26, 2025 </td>
                            </tr>
                            <tr>
                                <td class="py-1">
                                    <img src="<?= base_url('assets/images/faces-clipart/pic-3.png') ?>" alt="image">
                                </td>
                                <td> John Richards </td>
                                <td> 2025106809087 </td>
                                <td> 11:11 </td>
                                <td> Jun 26, 2025 </td>
                            </tr>
                            <tr>
                                <td class="py-1">
                                    <img src="<?= base_url('assets/images/faces-clipart/pic-4.png') ?>" alt="image">
                                </td>
                                <td> Peter Meggik </td>
                                <td> 2025106809087 </td>
                                <td> 11:10 </td>
                                <td> Jun 26, 2025 </td>
                            </tr>
                            <tr>
                                <td class="py-1">
                                    <img src="<?= base_url('assets/images/faces-clipart/pic-1.png') ?>" alt="image">
                                </td>
                                <td> Edward </td>
                                <td> 2025106809087 </td>
                                <td> 11:10 </td>
                                <td> Jun 26, 2025 </td>
                            </tr>
                            <tr>
                                <td class="py-1">
                                    <img src="<?= base_url('assets/images/faces-clipart/pic-2.png') ?>" alt="image">
                                </td>
                                <td> John Doe </td>
                                <td> 2025106809087 </td>
                                <td> 11:10 </td>
                                <td> Jun 26, 2025 </td>
                            </tr>
                            <tr>
                                <td class="py-1">
                                    <img src="<?= base_url('assets/images/faces-clipart/pic-3.png') ?>" alt="image">
                                </td>
                                <td> Henry Tom </td>
                                <td> 2025106809087 </td>
                                <td> 11:10 </td>
                                <td> Jun 26, 2025 </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title" id="titulo-grafico" style="text-align: center; padding: 10px 0;">
                        Estatística das Últimas: Quartas e Quintas
                    </h4>
                    <div id="morris-bar-example"></div>
                    <div style="display: flex; justify-content: space-between; margin-top: 10px;">
                        <button id="anterior" class="btn btn-icon">
                            <i class="mdi mdi-chevron-double-left" style="font-size: 28px;"></i>
                        </button>
                        <button id="proximo" class="btn btn-icon">
                            <i class="mdi mdi-chevron-double-right" style="font-size: 28px;"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title" style="text-align: center;">Imagem QRCode</h4>
                    <form action="/file-upload" class="dropzone d-flex align-items-center" id="my-awesome-dropzone">
                    </form>
                    <div class="file-upload-wrapper">
                        <div id="fileuploader">Upload</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<script>
    // GRÁFICO REDONDO
    //
    //
    document.addEventListener("DOMContentLoaded", function() {
        var ctx = document.getElementById("transaction-history").getContext("2d");

        // Destroi gráfico anterior se existir ---- O uso de window.transactionChart é para evitar conflitos com o gráfico anterior. (Verificar se não prejudica o código)
        if (window.transactionChart) {
            window.transactionChart.destroy();
        }

        window.transactionChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ['Total_Utilizadas', 'Total_Emitidas', 'Total_Sobras'], // nomes usados no tooltip
                datasets: [{
                    data: [150, 30, 20], // valores das fatias -- (Aqui a soma tem que dar o total de alunos)
                    backgroundColor: ['#e53935', '#43a047', '#1e88e5'], // cores das fatias
                    borderColor: "#191c24"
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: false // <- desativa a legenda visível
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                let label = context.label || '';
                                let value = context.raw || 0;
                                return `${label}: ${value} alunos`;
                            }
                        }
                    }
                },
                cutout: '70%' // mantém o "buraco" no centro do gráfico
            }
        });
    });

    //GRÁFICO DE BARRAS
    //
    //
    //
    // GRÁFICO DE BARRAS 1
    const datasets = [{
            titulo: "Estatística das Últimas: Quartas",
            dados: [{
                    y: 'Semana Passada',
                    a: 150,
                    b: 100,
                    c: 90
                },
                {
                    y: 'Semana Retrasada',
                    a: 100,
                    b: 100,
                    c: 80
                }
            ]
        },
        { //GRÁFICO DE BARRAS 2
            titulo: "Estatística das Últimas: Quintas",
            dados: [{
                    y: 'Semana Passada',
                    a: 120,
                    b: 80,
                    c: 60
                },
                {
                    y: 'Semana Retrasada',
                    a: 90,
                    b: 70,
                    c: 50
                }
            ]
        }
    ];

    let currentIndex = 0;
    let chart;

    document.addEventListener("DOMContentLoaded", function() {
        if (typeof Morris !== 'undefined') {
            chart = Morris.Bar({
                element: 'morris-bar-example',
                data: datasets[currentIndex].dados,
                xkey: 'y',
                ykeys: ['a', 'b', 'c'],
                labels: ['Previstos', 'Confirmados', 'Servidos'], //Informações do gráfico
                barColors: ['#1f3bb3', '#f1536e', 'green'], //cores do gráfico
                hideHover: 'false',
                gridLineColor: '#e0e0e0',
                resize: true
            });

            document.getElementById("titulo-grafico").innerText = datasets[currentIndex].titulo;

            document.getElementById("proximo").addEventListener("click", function() {
                currentIndex = (currentIndex + 1) % datasets.length;
                atualizarGrafico();
            });

            document.getElementById("anterior").addEventListener("click", function() {
                currentIndex = (currentIndex - 1 + datasets.length) % datasets.length;
                atualizarGrafico();
            });
        } else {
            console.error('Morris.js não carregado.');
        }
    });

    function atualizarGrafico() {
        chart.setData(datasets[currentIndex].dados);
        document.getElementById("titulo-grafico").innerText = datasets[currentIndex].titulo;
    }
</script>

<script src="<?= base_url('assets/vendors/raphael/raphael.min.js') ?>"></script>
<script src="<?= base_url('assets/vendors/morris.js/morris.min.js') ?>"></script>
<script src="<?= base_url('assets/vendors/dropzone/dropzone.js') ?>"></script>
<script src="<?= base_url('assets/vendors/jquery-file-upload/jquery.uploadfile.min.js') ?>"></script>
<script src="<?= base_url('assets/js/jquery-file-upload.js') ?>"></script>
<script src="<?= base_url('assets/js/dropzone.js') ?>"></script>

<script>
    // DROPZONE 
    document.addEventListener("DOMContentLoaded", function() {
        const dz = document.getElementById('my-awesome-dropzone');
        const dzMessage = dz.querySelector('.dz-message');
        if (dzMessage) {
            // Remove o botão gerado pela Dropzone
            dzMessage.innerHTML = '<span>Drop files here to upload</span>';
        }
    });
</script>