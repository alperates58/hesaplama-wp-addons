function hcAyYasiHesapla() {
    const now = new Date();
    const lp = 2551443;
    const new_moon_ref = 592500;
    const current_ts = Math.floor(now.getTime() / 1000);
    
    let age_seconds = (current_ts - new_moon_ref) % lp;
    if (age_seconds < 0) age_seconds += lp;
    
    const age_days = (age_seconds / 86400).toFixed(1);

    let desc = "";
    if (age_days < 7) {
        desc = "Ay henüz çok genç. Bu dönem tohumların yeni filizlendiği, heyecanın ve umudun taze olduğu bir vakittir. Planlarınızı hayata geçirmek için gereken enerjiyi topluyorsunuz.";
    } else if (age_days < 14) {
        desc = "Ay ergenlik döneminde. Enerji hızla artıyor, engellerle karşılaşsanız bile pes etmemelisiniz. Harekete geçmek ve görünür olmak için en iyi zamanlardasınız.";
    } else if (age_days < 21) {
        desc = "Ay olgunluk döneminde (Dolunay sonrası). Artık sonuçları görme ve paylaşma vaktidir. Kazandığınız deneyimleri sindirmeli ve şükretmelisiniz.";
    } else {
        desc = "Ay yaşlılık döneminde. Bu vaktin enerjisi arınma ve teslimiyet üzerinedir. Yeni döngüye hazırlanmak için eskiyi bırakmalı ve dinlenmeye çekilmelisiniz.";
    }

    document.getElementById('hc-age-val').innerText = age_days + " Gün";
    document.getElementById('hc-age-desc').innerText = desc;
    document.getElementById('hc-age-result').classList.add('visible');
}
