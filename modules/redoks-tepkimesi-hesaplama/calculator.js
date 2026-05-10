function hcRedoksTepkimesiHesapla() {
    const input = document.getElementById('hc-rx-input').value.replace(/\s/g, '');
    if (!input) return;

    const db = {
        "Zn+Cu2+": "Zn → Zn²⁺ + 2e⁻ (Yükseltgenme)<br>Cu²⁺ + 2e⁻ → Cu (İndirgenme)",
        "Fe+O2": "Fe → Fe³⁺ (Yükseltgenme)<br>O₂ → O²⁻ (İndirgenme)",
        "Mg+HCl": "Mg → Mg²⁺ + 2e⁻ (Yükseltgenme)<br>2H⁺ + 2e⁻ → H₂ (İndirgenme)"
    };

    let result = db[input] || "Bu tepkime için detaylı analiz verisi bulunamadı.";
    
    document.getElementById('hc-rx-stats').innerHTML = result;
    document.getElementById('hc-rx-result').classList.add('visible');
}
