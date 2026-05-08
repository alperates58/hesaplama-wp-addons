function hcPozitifDegerlendir() {
    const hcg = parseFloat(document.getElementById('hc-pe-hcg').value);
    const lmpVal = document.getElementById('hc-pe-lmp').value;

    let summary = "Tebrikler! Testiniz pozitif.";
    let steps = "<ul>";

    if (lmpVal) {
        const lmp = new Date(lmpVal);
        const today = new Date();
        const diffWeeks = Math.floor((today - lmp) / (7 * 24 * 60 * 60 * 1000));
        summary += ` Yaklaşık ${diffWeeks} haftalık hamilesiniz.`;
    }

    if (!isNaN(hcg)) {
        if (hcg < 5) {
            summary = "Değer 5'in altında; gebelik kesin değil veya çok erken.";
            steps += "<li>2 gün sonra kan testini tekrarlayın.</li>";
        } else if (hcg < 1000) {
            steps += "<li>Gebelik çok yeni. Keseyi görmek için değerin 1500-2000 üzerine çıkması beklenir.</li>";
            steps += "<li>48 saat sonra değerin yaklaşık 2 katına çıkıp çıkmadığını kontrol etmek için tekrar test yaptırın.</li>";
        } else {
            steps += "<li>Gebelik kesesi (gestasyonel kese) ultrasonda görülebilir düzeye yaklaşmış.</li>";
            steps += "<li>Kadın doğum uzmanından randevu alarak ultrason muayenesi planlayın.</li>";
        }
    } else {
        steps += "<li>En yakın sağlık kuruluşunda kan testi (Beta hCG) yaptırarak gebeliği kesinleştirin.</li>";
    }

    steps += "<li>Folik asit takviyesine başlamadıysanız doktorunuza danışın.</li>";
    steps += "<li>Sigara, alkol ve bilinçsiz ilaç kullanımından kaçının.</li>";
    steps += "</ul>";

    document.getElementById('hc-pe-summary').innerText = summary;
    document.getElementById('hc-pe-steps').innerHTML = steps;

    document.getElementById('hc-pos-eval-result').classList.add('visible');
}
