function hcYapayZekaSuAyakİziHesapla() {
    const prompts = parseFloat(document.getElementById('hc-ai-prompts').value);

    if (!prompts) return;

    // Akademik araştırmalar (Google/Microsoft verileri): 
    // Yaklaşık her 20-50 soru (GPT-3/4 seviyesi) için 500ml su (soğutma için)
    // Ortalama: 1 soru ~ 15ml su
    const yearlyLiters = prompts * 52 * 0.015;

    document.getElementById('hc-ai-val').innerText = yearlyLiters.toFixed(1) + ' Litre';
    document.getElementById('hc-ai-info').innerText = `Veri merkezlerinin soğutulması için tüketilen su miktarını temsil eder.`;
    document.getElementById('hc-ai-result').classList.add('visible');
}
