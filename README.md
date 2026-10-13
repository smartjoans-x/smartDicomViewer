<div align="center">
  <img src="https://github.com/user-attachments/assets/741c7b1d-f99f-4e69-a340-1db927890e2d" alt="SmartViewer Banner" width="100%">
  
  <h1>🏥 SMARTVIEWER</h1>
  <p><b>Open-Source Web DICOM Viewer | Local-First Privacy | Free Integration API</b></p>
  
  <a href="https://smartjoans.space/dicom/"><img src="https://img.shields.io/badge/Live_Demo-smartjoans.space-blue?style=for-the-badge&logo=googlechrome" alt="Live Demo"></a>
  <a href="https://smartjoans.space/"><img src="https://img.shields.io/badge/Developer-SmartJoans-orange?style=for-the-badge&logo=codeigniter" alt="Developer"></a>
  <img src="https://img.shields.io/badge/Privacy-Local_First-success?style=for-the-badge&logo=shield" alt="Privacy">
</div>

<br>

## 📋 Project Overview
**SmartViewer** is a lightweight, browser-based DICOM viewer designed for opening, exploring, and sharing medical imaging studies seamlessly. It supports CT, MRI, X-ray, and ultrasound DICOM files directly from your computer, phone, scan CD/DVD, removable drives, or an integrated hospital system. 

Built for secondary viewing and sharing, the viewer runs entirely in your browser. 

🔒 **Privacy Model:** Files selected from your device are processed locally in the browser. Images are **never** uploaded to or stored on our servers.

---

## ⚡ Instant Self-Hosting (Zero Configuration)

> **Want to host SmartViewer on your own infrastructure? We made it incredibly easy! 🚀**
> 
> Simply download the attached `viewer.zip` file and extract it directly to any PHP-enabled server. **No installation, no databases, and absolutely no complex settings to configure!**

- ✅ **Local Environments:** Works flawlessly out of the box on **XAMPP**, WAMP, or MAMP.
- ✅ **Web Control Panels:** Upload and extract directly within your **cPanel**, DirectAdmin, or Plesk file manager.
- ✅ **Cloud Hosting:** Deploy instantly on any PHP-supported cloud hosting platform.

**How to run:** Just extract the ZIP file into your web directory and navigate to `index.php` in your browser. Your private DICOM viewer is instantly live!

---

## ✨ Key Features
- **Versatile File Support:** Open DICOM files, folders, scan CDs/DVDs, and removable drives (Drag & Drop supported).
- **Smart Sorting:** Automatic series grouping and slice sorting utilizing DICOM metadata.
- **Fluid Navigation:** Smooth image scrolling via mouse wheel, touch gestures, or keyboard.
- **Advanced Adjustments:** Window/level controls with presets for brain, lung, bone, abdomen, liver, and more.
- **Measurement Tools:** Length, angle, elliptical ROI, and pixel probe.
- **Image Manipulation:** Zoom, pan, magnifier, rotate, flip, invert, and PNG export.
- **Multi-Viewport Layouts:** Flexible grid views ranging from 1×1 up to 3×3.
- **MPR Views:** Axial, coronal, and sagittal planes; MIP slabs from 5–40 mm.
- **3D Volume Rendering:** Features presets including bone, skin, soft tissue, vessel, lung, and MIP.
- **Cine Playback:** Adjustable from 5–30 FPS and searchable DICOM tags.
- **Privacy Controls:** One-click hide patient details before screen sharing.
- **Cross-Platform:** Mobile-friendly interaction with support for multiple DICOM compression types.
- **API Ready:** Free API integration for websites, clinics, PACS, RIS, and patient portals.

---

## 📸 Interface Gallery

<table>
  <tr>
    <td align="center">
      <img src="https://github.com/user-attachments/assets/d1a11c12-a7b1-4e3f-a27d-034ddac7949c" width="100%" alt="Landing Page">
      <br><em>Landing page and open-study entry point</em>
    </td>
    <td align="center">
      <img src="https://github.com/user-attachments/assets/7d570011-aa2b-4c2b-befb-35438141ba37" width="100%" alt="Viewer Loading">
      <br><em>Viewer loading/opening state</em>
    </td>
  </tr>
  <tr>
    <td align="center">
      <img src="https://github.com/user-attachments/assets/78df8a88-0f4d-4b79-b3e1-7ba3bf73626c" width="100%" alt="Image Workspace">
      <br><em>Image viewing workspace</em>
    </td>
    <td align="center">
      <img src="https://github.com/user-attachments/assets/ea4cec75-2746-41d3-8169-61c62e49138d" width="100%" alt="Measurement Tools">
      <br><em>Measurement tools over a CT image</em>
    </td>
  </tr>
  <tr>
    <td align="center">
      <img src="https://github.com/user-attachments/assets/5b5e3cca-b1bb-4701-b2b7-585681755a10" width="100%" alt="MPR Layout">
      <br><em>Multi-planar reconstruction layout</em>
    </td>
    <td align="center">
      <img src="https://github.com/user-attachments/assets/5c9b2de6-0a46-4df2-8c59-db2fbb275395" width="100%" alt="MPR Workspace">
      <br><em>MPR workspace with multiple viewports</em>
    </td>
  </tr>
  <tr>
    <td colspan="2" align="center">
      <img src="https://github.com/user-attachments/assets/d3b4896d-0509-4516-9572-f922cabd2793" width="70%" alt="3D Volume Rendering">
      <br><em>3D volume rendering view</em>
    </td>
  </tr>
</table>

---

## 🚀 Getting Started

1. Open [SmartViewer](https://smartjoans.space/dicom/) in any modern web browser.
2. Choose a DICOM folder, individual files, or simply **drag and drop** files into the viewer.
3. For scan CDs/DVDs or pen drives, open the drive and select the study folder (the viewer intelligently skips `DICOMDIR` and unrelated viewer-program files).
4. On mobile devices, use the native file picker to select DICOM files.
5. Select a series from the sidebar and start using the viewing tools, layouts, MPR, or 3D controls.

---

## ⌨️ Keyboard Shortcuts

<details>
<summary><b>Click to reveal all shortcuts</b></summary>
<br>

| Key | Action | Key | Action |
| :--- | :--- | :--- | :--- |
| <kbd>W</kbd> | Window / Level | <kbd>↑</kbd> / <kbd>↓</kbd> | Previous / Next Image |
| <kbd>D</kbd> | Drag to scroll | <kbd>←</kbd> / <kbd>→</kbd> | Previous / Next Series |
| <kbd>Z</kbd> | Zoom | <kbd>PgUp</kbd> / <kbd>PgDn</kbd>| Move by 10 images |
| <kbd>P</kbd> | Pan | <kbd>Space</kbd> | Play / Pause Cine |
| <kbd>M</kbd> | Magnifier | <kbd>1</kbd>–<kbd>6</kbd> | Switch Layouts |
| <kbd>L</kbd> | Length Measurement | <kbd>X</kbd> | MPR On / Off |
| <kbd>A</kbd> | Angle Measurement | <kbd>R</kbd> | Reset View |
| <kbd>E</kbd> | Elliptical ROI | <kbd>I</kbd> | Invert |
| <kbd>B</kbd> | Pixel Probe | <kbd>O</kbd> | Rotate 90° |
| <kbd>T</kbd> | Text Overlay | <kbd>H</kbd> / <kbd>V</kbd> | Flip (Horizontal/Vertical) |
| <kbd>G</kbd> | DICOM Tags | <kbd>S</kbd> | Save PNG |
| <kbd>F</kbd> | Full Screen | <kbd>Esc</kbd> | Leave MPR / 3D |

</details>

---

## 🔌 Free API Integration

Integrate SmartViewer into your own websites, clinics, PACS, RIS, or patient portals. Choose the method that best fits your infrastructure.

### Way 1 — Open Image URLs
Best for a small number of files. Pass each DICOM file as a URL parameter (ensure URLs are URL-encoded).
```text
[https://smartjoans.space/dicom/?title=Chest%20X-ray&url=ENCODED_IMAGE_URL_1&url=ENCODED_IMAGE_URL_2](https://smartjoans.space/dicom/?title=Chest%20X-ray&url=ENCODED_IMAGE_URL_1&url=ENCODED_IMAGE_URL_2)
