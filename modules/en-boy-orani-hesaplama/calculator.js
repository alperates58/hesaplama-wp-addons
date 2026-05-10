function hcEnBoyOranıHesapla() {
    const w = parseInt(document.getElementById('hc-ar-w').value);
    const h = parseInt(document.getElementById('hc-ar-h').value);

    if (!w || !h) return;

    function gcd(a, b) {
        return b === 0 ? a : gcd(b, a % b);
    }

    const divisor = gcd(w, h);
    const ratio = `${w / divisor}:${h / divisor}`;

    document.getElementById('hc-ar-val').innerText = ratio;

    let type = "Özel Oran";
    if (ratio === "16:9") type = "Standart Geniş Ekran (Widescreen)";
    else if (ratio === "4:3") type = "Eski TV / Monitör Standart";
    else if (ratio === "1:1") type = "Kare (Instagram vb.)";
    else if (ratio === "9:16") type = "Dikey (Story / Reels / TikTok)";
    else if (ratio === "21:9") type = "Sinematik / Ultrawide";

    document.getElementById('hc-ar-type').innerText = type;
    document.getElementById('hc-ar-result').classList.add('visible');
}
