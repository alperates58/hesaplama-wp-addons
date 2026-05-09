function hcYeniAyHesapla() {
    const now = new Date();
    const lp = 2551443;
    const new_moon_ref = 592500;
    const current_ts = Math.floor(now.getTime() / 1000);
    
    let phase = ((current_ts - new_moon_ref) % lp) / lp;
    if (phase < 0) phase += 1;

    // Next New Moon is at phase 1.0 (or 0.0)
    let time_to_new = (1.0 - phase) * lp;

    const next_date = new Date(now.getTime() + time_to_new * 1000);
    const options = { year: 'numeric', month: 'long', day: 'numeric', hour: '2-digit', minute: '2-digit' };
    const dateStr = next_date.toLocaleDateString('tr-TR', options);

    document.getElementById('hc-new-val').innerText = dateStr;
    document.getElementById('hc-new-desc').innerText = "Yeni Ay, gökyüzünün en karanlık olduğu ama aynı zamanda en güçlü tohumların ekildiği zamandır. Bu evre, hayatınızda yeni sayfalar açmak, hedefler belirlemek ve taze bir başlangıç yapmak için muazzam bir enerji taşır. Niyetlerinizi belirleyin ve evrenin destekleyici gücüyle harekete geçmek için bu vakti bekleyin.";
    document.getElementById('hc-new-result').classList.add('visible');
}
