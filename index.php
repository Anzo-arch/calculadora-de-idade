<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora de Idade</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 20px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
        }
        
        .container {
            max-width: 800px;
            margin: 30px auto;
            padding: 30px;
            background: white;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
        }
        
        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 10px;
        }
        
        .subtitle {
            text-align: center;
            color: #666;
            margin-bottom: 30px;
        }
        
        .server-info {
            background: #d1ecf1;
            padding: 12px;
            margin-bottom: 20px;
            border-radius: 8px;
            text-align: center;
            border-left: 4px solid #17a2b8;
            font-size: 14px;
        }
        
        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
            gap: 15px;
            margin-bottom: 20px;
        }
        
        .form-group {
            margin-bottom: 15px;
        }
        
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #555;
        }
        
        input, select, button {
            padding: 12px;
            margin: 5px 0;
            width: 100%;
            box-sizing: border-box;
            border: 2px solid #ddd;
            border-radius: 8px;
            font-size: 16px;
        }
        
        input:focus, select:focus {
            outline: none;
            border-color: #007bff;
        }
        
        button {
            background: linear-gradient(135deg, #007bff, #0056b3);
            color: white;
            border: none;
            cursor: pointer;
            font-weight: bold;
            transition: transform 0.2s;
        }
        
        button:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0,123,255,0.3);
        }
        
        .btn-voltar {
            background: linear-gradient(135deg, #6c757d, #545b62);
        }
        
        .result {
            background: #f8f9fa;
            padding: 25px;
            margin-top: 25px;
            border-radius: 10px;
            border-left: 5px solid #28a745;
        }
        
        .age-display {
            text-align: center;
            font-size: 28px;
            margin: 20px 0;
            padding: 25px;
            background: linear-gradient(135deg, #e3f2fd, #bbdefb);
            border-radius: 10px;
            font-weight: bold;
        }
        
        .age-number {
            font-size: 48px;
            color: #155724;
            margin: 15px 0;
        }
        
        .details-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            gap: 15px;
            margin: 20px 0;
        }
        
        .detail-card {
            background: white;
            padding: 15px;
            border-radius: 8px;
            text-align: center;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        
        .detail-name {
            font-weight: bold;
            color: #555;
            font-size: 14px;
            margin-bottom: 5px;
        }
        
        .detail-value {
            font-size: 18px;
            color: #333;
            font-weight: bold;
        }
        
        .timeline {
            background: #fff3cd;
            padding: 20px;
            border-radius: 8px;
            margin: 20px 0;
            border-left: 4px solid #ffc107;
        }
        
        .timeline-bar {
            height: 20px;
            background: #e9ecef;
            border-radius: 10px;
            margin: 15px 0;
            overflow: hidden;
            position: relative;
        }
        
        .timeline-filled {
            height: 100%;
            background: linear-gradient(90deg, #28a745, #20c997);
            border-radius: 10px;
            transition: width 0.5s ease;
        }
        
        .timeline-labels {
            display: flex;
            justify-content: space-between;
            margin-top: 5px;
            font-size: 12px;
            color: #666;
        }
        
        .error {
            background: #f8d7da;
            padding: 15px;
            margin-top: 20px;
            border-radius: 8px;
            border-left: 5px solid #dc3545;
            color: #721c24;
            text-align: center;
        }
        
        .zodiac-info {
            background: #e9ecef;
            padding: 15px;
            border-radius: 8px;
            margin: 15px 0;
            text-align: center;
        }
        
        .button-group {
            display: flex;
            gap: 10px;
        }
        
        .button-group button {
            flex: 1;
        }
        
        .examples {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(120px, 1fr));
            gap: 10px;
            margin-top: 15px;
        }
        
        .example-card {
            background: #e9ecef;
            padding: 10px;
            border-radius: 5px;
            text-align: center;
            cursor: pointer;
            transition: background 0.3s;
            font-size: 12px;
        }
        
        .example-card:hover {
            background: #dee2e6;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>🎂 Calculadora de Idade</h1>
        <div class="subtitle">Descubra sua idade exata e curiosidades sobre sua data de nascimento</div>
        
        <?php
        // OBTÉM INFORMAÇÕES DO SERVIDOR
        $data_atual = date('d/m/Y');
        $ano_atual = date('Y');
        $mes_atual = date('m');
        $dia_atual = date('d');
        $hora_atual = date('H:i:s');
        ?>
        
        <div class="server-info">
            <strong>🖥️ Informações do Servidor:</strong><br>
            Data atual: <strong><?php echo $data_atual; ?></strong> | 
            Hora: <strong><?php echo $hora_atual; ?></strong> | 
            Ano: <strong><?php echo $ano_atual; ?></strong>
        </div>
        
        <form method="POST">
            <div class="form-grid">
                <div class="form-group">
                    <label for="dia">📅 Dia:</label>
                    <input type="number" id="dia" name="dia" min="1" max="31" 
                           placeholder="DD" required
                           value="<?php echo isset($_POST['dia']) ? htmlspecialchars($_POST['dia']) : ''; ?>">
                </div>
                
                <div class="form-group">
                    <label for="mes">📅 Mês:</label>
                    <select id="mes" name="mes" required>
                        <option value="">Selecione</option>
                        <?php
                        $meses = [
                            1 => 'Janeiro', 2 => 'Fevereiro', 3 => 'Março', 4 => 'Abril',
                            5 => 'Maio', 6 => 'Junho', 7 => 'Julho', 8 => 'Agosto',
                            9 => 'Setembro', 10 => 'Outubro', 11 => 'Novembro', 12 => 'Dezembro'
                        ];
                        
                        $mes_selecionado = isset($_POST['mes']) ? (int)$_POST['mes'] : 0;
                        
                        foreach ($meses as $numero => $nome) {
                            $selected = ($mes_selecionado === $numero) ? 'selected' : '';
                            echo "<option value='{$numero}' {$selected}>{$nome}</option>";
                        }
                        ?>
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="ano">📅 Ano:</label>
                    <input type="number" id="ano" name="ano" min="1900" max="<?php echo $ano_atual; ?>" 
                           placeholder="AAAA" required
                           value="<?php echo isset($_POST['ano']) ? htmlspecialchars($_POST['ano']) : ''; ?>">
                </div>
            </div>
            
            <div class="examples">
                <div class="example-card" onclick="preencherData(15, 8, 1990)">
                    <strong>15/08/1990</strong><br>~33 anos
                </div>
                <div class="example-card" onclick="preencherData(1, 1, 2000)">
                    <strong>01/01/2000</strong><br>~24 anos
                </div>
                <div class="example-card" onclick="preencherData(25, 12, 1985)">
                    <strong>25/12/1985</strong><br>~38 anos
                </div>
                <div class="example-card" onclick="preencherData(10, 6, 2010)">
                    <strong>10/06/2010</strong><br>~14 anos
                </div>
            </div>
            
            <div class="button-group">
                <button type="submit">🧮 Calcular Idade</button>
                <?php if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['dia'])): ?>
                <button type="button" class="btn-voltar" onclick="limparCampos()">↺ Nova Consulta</button>
                <?php endif; ?>
            </div>
        </form>

        <?php
        // === FUNÇÕES ===

        function determinarSigno($dia, $mes) {
            $signos = [
                ['Áries', 21, 3, 19, 4],
                ['Touro', 20, 4, 20, 5],
                ['Gêmeos', 21, 5, 20, 6],
                ['Câncer', 21, 6, 22, 7],
                ['Leão', 23, 7, 22, 8],
                ['Virgem', 23, 8, 22, 9],
                ['Libra', 23, 9, 22, 10],
                ['Escorpião', 23, 10, 21, 11],
                ['Sagitário', 22, 11, 21, 12],
                ['Capricórnio', 22, 12, 19, 1],
                ['Aquário', 20, 1, 18, 2],
                ['Peixes', 19, 2, 20, 3]
            ];
            
            foreach ($signos as $signo) {
                list($nome, $dia_inicio, $mes_inicio, $dia_fim, $mes_fim) = $signo;
                if (($mes == $mes_inicio && $dia >= $dia_inicio) ||
                    ($mes == $mes_fim && $dia <= $dia_fim) ||
                    ($mes_inicio > $mes_fim && ($mes == $mes_inicio || $mes == $mes_fim))) {
                    return $nome;
                }
            }
            return 'Não identificado';
        }

        function calcularDiasProximoAniversario($data_nascimento, $data_atual) {
            $aniversario_este_ano = DateTime::createFromFormat('d/m/Y', $data_nascimento->format('d/m') . '/' . $data_atual->format('Y'));
            if ($aniversario_este_ano < $data_atual) $aniversario_este_ano->modify('+1 year');
            $diferenca = $data_atual->diff($aniversario_este_ano);
            return $diferenca->days;
        }

        function calcularIdade($dia, $mes, $ano) {
            $data_nascimento = DateTime::createFromFormat('d/m/Y', "{$dia}/{$mes}/{$ano}");
            $data_atual = new DateTime();

            if (!$data_nascimento) throw new Exception("Data inválida!");
            if ($data_nascimento->getTimestamp() > $data_atual->getTimestamp()) throw new Exception("Data de nascimento não pode ser no futuro!");

            $diferenca = $data_atual->diff($data_nascimento);
            return [
                'anos' => $diferenca->y,
                'meses' => $diferenca->m,
                'dias' => $diferenca->d,
                'total_dias' => $diferenca->days,
                'total_meses' => ($diferenca->y * 12) + $diferenca->m,
                'data_nascimento' => $data_nascimento->format('d/m/Y'),
                'idade_exata' => "{$diferenca->y} anos, {$diferenca->m} meses e {$diferenca->d} dias",
                'signo' => determinarSigno($dia, $mes),
                'dias_para_proximo_aniversario' => calcularDiasProximoAniversario($data_nascimento, $data_atual)
            ];
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['dia'])) {
            $dia = (int)$_POST['dia'];
            $mes = (int)$_POST['mes'];
            $ano = (int)$_POST['ano'];

            if (!checkdate($mes, $dia, $ano)) {
                echo "<div class='error'><p>❌ Data inválida! Verifique o dia, mês e ano.</p></div>";
            } else {
                try {
                    $idade = calcularIdade($dia, $mes, $ano);

                    echo "<div class='result'>";
                    echo "<div class='age-display'><div>Sua idade é:</div>
                          <div class='age-number'>{$idade['anos']} anos</div>
                          <div>{$idade['idade_exata']}</div></div>";

                    echo "<div class='details-grid'>";
                    $detalhes = [
                        '📅 Data de Nascimento' => $idade['data_nascimento'],
                        '⭐ Signo' => $idade['signo'],
                        '📊 Total de Meses' => number_format($idade['total_meses'], 0, ',', '.'),
                        '📈 Total de Dias' => number_format($idade['total_dias'], 0, ',', '.'),
                        '🎂 Próximo Aniversário' => $idade['dias_para_proximo_aniversario'] . ' dias',
                        '🎯 Idade em Anos' => $idade['anos'] . ' anos'
                    ];
                    foreach ($detalhes as $nome => $valor)
                        echo "<div class='detail-card'><div class='detail-name'>$nome</div><div class='detail-value'>$valor</div></div>";
                    echo "</div>";

                    $percentual_vida = min(100, $idade['anos']);
                    echo "<div class='timeline'><strong>📈 Linha do Tempo:</strong><br>
                          <div class='timeline-bar'><div class='timeline-filled' style='width: {$percentual_vida}%;'></div></div>
                          <div class='timeline-labels'><span>Nascimento<br>{$idade['data_nascimento']}</span>
                          <span>Hoje<br>" . date('d/m/Y') . "</span>
                          <span>+100 anos<br>" . ($ano + 100) . "</span></div></div>";

                    $formatter = new IntlDateFormatter('pt_BR', IntlDateFormatter::FULL, IntlDateFormatter::NONE, 'America/Sao_Paulo', IntlDateFormatter::GREGORIAN, 'EEEE');
                    $dia_semana = ucfirst($formatter->format(new DateTime("{$ano}-{$mes}-{$dia}")));
                    echo "<div class='zodiac-info'><strong>🔮 Curiosidades:</strong><br>
                          • Você nasceu em uma {$dia_semana}<br>
                          • Já viveu aproximadamente " . number_format($idade['total_dias'], 0, ',', '.') . " dias<br>
                          • Seu próximo aniversário é em {$idade['dias_para_proximo_aniversario']} dias</div></div>";

                } catch (Exception $e) {
                    echo "<div class='error'><p>❌ {$e->getMessage()}</p></div>";
                }
            }
        }
        ?>
        
        <div style="margin-top: 30px; padding: 15px; background: #e9ecef; border-radius: 8px; font-size: 12px; text-align: center;">
            <strong>💡 Como funciona:</strong><br>
            O PHP captura a data atual do servidor e calcula a diferença entre a data de nascimento e a data atual.
        </div>
    </div>

    <script>
        function preencherData(dia, mes, ano) {
            document.getElementById('dia').value = dia;
            document.getElementById('mes').value = mes;
            document.getElementById('ano').value = ano;
        }

        function limparCampos() {
            document.getElementById('dia').value = '';
            document.getElementById('mes').value = '';
            document.getElementById('ano').value = '';
            document.querySelector('.result')?.remove();
            document.querySelector('.error')?.remove();
            document.getElementById('dia').focus();
        }

        document.getElementById('mes').addEventListener('change', function() {
            const diaInput = document.getElementById('dia');
            const mes = parseInt(this.value);
            const dia = parseInt(diaInput.value);
            const ano = parseInt(document.getElementById('ano').value) || new Date().getFullYear();
            const diasNoMes = new Date(ano, mes, 0).getDate();

            if (mes && dia && dia > diasNoMes) diaInput.setCustomValidity(`Este mês tem apenas ${diasNoMes} dias`);
            else diaInput.setCustomValidity('');
        });

        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('dia').focus();
        });
    </script>
</body>
</html>
