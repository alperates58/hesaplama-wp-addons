function hcEpdsHesapla() {
    var questions = document.querySelectorAll('.hc-epds-q');
    var total = 0;
    var q10Value = 0;

    questions.forEach(function(q, index) {
        var val = parseInt(q.value);
        total += val;
        if (index === 9) q10Value = val;
    });

    var yorum = "";
    var statusClass = "";

    if (total < 10) {
        yorum = "Skorunuz düşük seviyededir. Duygusal durumunuzun normal sınırlar içinde olduğu söylenebilir.";
        statusClass = "normal";
    } else if (total <= 12) {
        yorum = "Hafif düzeyde depresyon veya stres belirtileri olabilir. Dinlenmeye ve destek almaya çalışın, belirtiler artarsa uzmana danışın.";
        statusClass = "warning";
    } else {
        yorum = "Skorunuz doğum sonrası depresyon riski açısından yüksek görünmektedir. Lütfen bir psikiyatrist veya psikolog ile görüşün.";
        statusClass = "danger";
    }

    if (q10Value > 0) {
        yorum = "DİKKAT: Kendine zarar verme düşüncesi işaretlendi. Toplam skordan bağımsız olarak acilen profesyonel yardım almanız önerilir.";
        statusClass = "danger";
    }

    var resDiv = document.getElementById('hc-epds-result');
    var scoreDiv = document.getElementById('hc-epds-score');
    var yorumDiv = document.getElementById('hc-epds-yorum');

    scoreDiv.textContent = "Skor: " + total;
    scoreDiv.className = "hc-result-value " + statusClass;
    yorumDiv.textContent = yorum;
    resDiv.classList.add('visible');
}
