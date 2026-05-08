function hcYokdilHesapla() {
    const correct = parseInt(document.getElementById('hc-yokdil-correct').value) || 0;

    if (correct > 80) {
        alert('Doğru sayısı 80\'den fazla olamaz.');
        return;
    }

    const score = correct * 1.25;
    
    document.getElementById('hc-yokdil-val').innerText = score.toLocaleString('tr-TR') + " Puan";
    document.getElementById('hc-yokdil-result').classList.add('visible');
}
