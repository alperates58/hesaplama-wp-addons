function hcEhliyetHesapla() {
    const correct = parseInt(document.getElementById('hc-ehliyet-correct').value) || 0;
    if (correct > 50) { alert('Doğru sayısı 50\'den fazla olamaz.'); return; }
    
    const score = correct * 2;
    document.getElementById('hc-ehliyet-val').innerText = score;
    
    const statusEl = document.getElementById('hc-ehliyet-status');
    if (score >= 70) {
        statusEl.innerText = "BAŞARILI (GEÇTİ)";
        statusEl.style.color = "green";
    } else {
        statusEl.innerText = "BAŞARISIZ (KALDI)";
        statusEl.style.color = "red";
    }
    document.getElementById('hc-ehliyet-result').classList.add('visible');
}
