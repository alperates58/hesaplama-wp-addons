function hcDolunayHesapla() {
    const now = new Date();
    const lp = 2551443; // Lunar cycle in seconds
    const new_moon_ref = 592500; // Reference New Moon
    const current_ts = Math.floor(now.getTime() / 1000);
    
    // Find phase
    let phase = ((current_ts - new_moon_ref) % lp) / lp;
    if (phase < 0) phase += 1;

    // Full moon is at phase 0.5
    let time_to_full = (0.5 - phase) * lp;
    if (time_to_full < 0) time_to_full += lp;

    const full_moon_date = new Date(now.getTime() + time_to_full * 1000);
    const options = { year: 'numeric', month: 'long', day: 'numeric', hour: '2-digit', minute: '2-digit' };
    const dateStr = full_moon_date.toLocaleDateString('tr-TR', options);

    document.getElementById('hc-full-val').innerText = dateStr;
    document.getElementById('hc-full-desc').innerText = "Dolunay, her şeyin netleştiği, gizli kalanların gün ışığına çıktığı ve çabalarınızın sonuçlandığı bir tamamlanma evresidir. Bu dönemde duygularınız çok daha yoğun olabilir; sezgilerinize güvenin ve hayatınızda artık size hizmet etmeyen her şeyi bırakmak için bu güçlü enerjiyi kullanın.";
    document.getElementById('hc-full-result').classList.add('visible');
}
