function hcAyFaziHesapla() {
    const dateStr = document.getElementById('hc-ay-date-alt').value;
    if (!dateStr) { alert('Lütfen bir tarih seçin.'); return; }
    
    const date = new Date(dateStr);
    const lp = 2551443;
    const now = Math.floor(date.getTime() / 1000);
    const new_moon = 592500;
    
    let phase = ((now - new_moon) % lp) / lp;
    if (phase < 0) phase += 1;

    let phaseName = "";
    let phaseDesc = "";

    if (phase < 0.03 || phase > 0.97) {
        phaseName = "Yeni Ay (Karanlık Ay)";
        phaseDesc = "Ruhun dinlendiği ve yeni niyetlerin sessizce filizlendiği en derin evredir.";
    } else if (phase < 0.25) {
        phaseName = "Hilal (Büyüyen)";
        phaseDesc = "Fikirlerin somut adımlara dönüştüğü, hareketli bir başlangıç evresidir.";
    } else if (phase < 0.5) {
        phaseName = "İlk Dördün";
        phaseDesc = "Kararlılığın test edildiği, engellerin cesaretle aşıldığı bir büyüme evresidir.";
    } else if (phase < 0.53) {
        phaseName = "Dolunay";
        phaseDesc = "Zirve noktası. Her şeyin aydınlandığı, sonuçların alındığı en güçlü evredir.";
    } else if (phase < 0.75) {
        phaseName = "Küçülen Ay";
        phaseDesc = "Sindirime, paylaşmaya ve elimizdekiler için şükretmeye odaklandığımız bir evredir.";
    } else {
        phaseName = "Son Dördün";
        phaseDesc = "Bırakma, arınma ve ruhsal bir temizlik yaparak döngüyü tamamlama vaktidir.";
    }

    document.getElementById('hc-ay-val-alt').innerText = phaseName;
    document.getElementById('hc-ay-desc-alt').innerText = phaseDesc;
    document.getElementById('hc-ay-result-alt').classList.add('visible');
}
