function hcYokdilPHesapla() {
    const correct = parseInt(document.getElementById('hc-yokdil-p-correct').value) || 0;
    if (correct > 80) { alert('Soru sayısı 80\'den fazla olamaz.'); return; }
    
    const score = correct * 1.25;
    document.getElementById('hc-yokdil-p-val').innerText = score.toFixed(2);
    document.getElementById('hc-yokdil-p-result').classList.add('visible');
}
