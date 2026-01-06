const $ = id => document.getElementById(id);

const dia = $("dia");
const mes = $("mes");
const ano = $("ano");
const output = $("output");
const serverInfo = $("serverInfo");
const ageForm = $("ageForm");

const now = new Date();

/* ===== DARK MODE ===== */
$("toggleDark").addEventListener("click", () => {
  document.documentElement.classList.toggle("dark");
});

/* ===== SERVER INFO ===== */
serverInfo.innerHTML = `
📅 Hoje: <strong>${now.toLocaleDateString("pt-BR")}</strong> |
⏰ Hora: <strong>${now.toLocaleTimeString("pt-BR")}</strong>
`;

/* ===== SIGNO ===== */
function getSigno(d, m) {
  const signos = [
    ["Áries", 21, 3, 19, 4], ["Touro", 20, 4, 20, 5],
    ["Gêmeos", 21, 5, 20, 6], ["Câncer", 21, 6, 22, 7],
    ["Leão", 23, 7, 22, 8], ["Virgem", 23, 8, 22, 9],
    ["Libra", 23, 9, 22, 10], ["Escorpião", 23, 10, 21, 11],
    ["Sagitário", 22, 11, 21, 12], ["Capricórnio", 22, 12, 19, 1],
    ["Aquário", 20, 1, 18, 2], ["Peixes", 19, 2, 20, 3]
  ];

  return signos.find(s =>
    (m === s[2] && d >= s[1]) || (m === s[4] && d <= s[3])
  )?.[0] || "—";
}

/* ===== EXAMPLES ===== */
document.querySelectorAll("[data-date]").forEach(btn => {
  btn.addEventListener("click", () => {
    const [d, m, a] = btn.dataset.date.split("-");
    dia.value = d;
    mes.value = m;
    ano.value = a;
  });
});

/* ===== CALCULAR ===== */
ageForm.addEventListener("submit", e => {
  e.preventDefault();

  const d = +dia.value;
  const m = +mes.value;
  const a = +ano.value;
  const nasc = new Date(a, m - 1, d);

  if (isNaN(nasc) || nasc > now) {
    output.innerHTML = `
      <div class="mt-6 bg-red-50 dark:bg-red-900 text-red-700 dark:text-red-200
      border-l-4 border-red-500 p-4 rounded-lg animate-fade">
        ❌ Data inválida
      </div>`;
    return;
  }

  let anos = now.getFullYear() - a;
  if (new Date(now.getFullYear(), m - 1, d) > now) anos--;

  const dias = Math.floor((now - nasc) / 86400000);

  output.innerHTML = `
    <div class="mt-6 bg-green-50 dark:bg-green-900 border-l-4 border-green-500
    p-6 rounded-lg text-center animate-fade">
      <div class="text-4xl font-bold text-green-700 dark:text-green-300 mb-4">
        ${anos} anos
      </div>
      <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
        <div class="card">📅 ${nasc.toLocaleDateString("pt-BR")}</div>
        <div class="card">⭐ ${getSigno(d, m)}</div>
        <div class="card">📈 ${dias.toLocaleString()} dias</div>
      </div>
    </div>`;
});
