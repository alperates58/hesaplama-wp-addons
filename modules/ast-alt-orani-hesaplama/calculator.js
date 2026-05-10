function hcASTALTOranıHesapla() {
    const ast = parseFloat(document.getElementById('hc-aa-ast').value);
    const alt = parseFloat(document.getElementById('hc-aa-alt').value);

    if (!ast || !alt) return;

    // Ratio = AST / ALT
    const ratio = ast / alt;

    document.getElementById('hc-aa-val').innerText = ratio.toFixed(2);
    
    let desc = "";
    if (ratio > 2.0) desc = "⚠️ Olası Alkolik Karaciğer Hasarı";
    else if (ratio < 1.0) desc = "⚠️ Olası Viral Hepatit veya Yağlanma";
    else desc = "Normal / Spesifik Olmayan Aralık";

    document.getElementById('hc-aa-desc').innerText = desc;
    document.getElementById('hc-aa-result').classList.add('visible');
}
