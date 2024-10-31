<?php

namespace Plugin\PixobeDesigner;

class Constants
{
    public const PIXOBE_API_ENDPOINT = 'https://pixobe.com/v2/api';
    public const APP_NAME = 'Pixobe Designer';
    public const OPTION_PREFIX = 'pixobe_designer';
    public const PIXOBE_ICON = 'data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjQiIGhlaWdodD0iMjQiIHZpZXdCb3g9IjAgMCAyNCAyNCIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPHBhdGggZD0iTTYuMDE5NjEgMTYuNTI2NEgzLjQ0MDgxQzIuNjQ1MDcgMTYuNTI2NCAyIDE3LjE3MyAyIDE3Ljk3MDdWMjAuNTU1OEMyIDIxLjM1MzQgMi42NDUwNyAyMi4wMDAxIDMuNDQwODEgMjIuMDAwMUg2LjAxOTYxQzYuODE1MzUgMjIuMDAwMSA3LjQ2MDQyIDIxLjM1MzQgNy40NjA0MiAyMC41NTU4VjE3Ljk3MDdDNy40NjA0MiAxNy4xNzMgNi44MTUzNSAxNi41MjY0IDYuMDE5NjEgMTYuNTI2NFoiIGZpbGw9IiMyRDJEMkQiLz4KPHBhdGggZD0iTTIwLjM2NTMgMi4xNzgxNkgxNy43ODY1QzE2Ljk5MDggMi4xNzgxNiAxNi4zNDU3IDIuODI0ODEgMTYuMzQ1NyAzLjYyMjVWNi4yMDc1NUMxNi4zNDU3IDcuMDA1MjMgMTYuOTkwOCA3LjY1MTg0IDE3Ljc4NjUgNy42NTE4NEgyMC4zNjUzQzIxLjE2MTEgNy42NTE4NCAyMS44MDYxIDcuMDA1MjMgMjEuODA2MSA2LjIwNzU1VjMuNjIyNUMyMS44MDYxIDIuODI0ODEgMjEuMTYxMSAyLjE3ODE2IDIwLjM2NTMgMi4xNzgxNloiIGZpbGw9IiMyRDJEMkQiLz4KPHBhdGggZD0iTTYuMDIzNzggMkgzLjQ0NDk4QzIuNjQ5MjQgMiAyLjAwNDE3IDIuNjQ2NjUgMi4wMDQxNyAzLjQ0NDM0VjYuMDI5MzlDMi4wMDQxNyA2LjgyNzA3IDIuNjQ5MjQgNy40NzM2OCAzLjQ0NDk4IDcuNDczNjhINi4wMjM3OEM2LjgxOTUyIDcuNDczNjggNy40NjQ1OSA2LjgyNzA3IDcuNDY0NTkgNi4wMjkzOVYzLjQ0NDM0QzcuNDY0NTkgMi42NDY2NSA2LjgxOTUyIDIgNi4wMjM3OCAyWiIgZmlsbD0iIzJEMkQyRCIvPgo8cGF0aCBkPSJNMjAuMzA0OSAxNi4zMTU4SDE3LjcyNjFDMTYuOTMwNCAxNi4zMTU4IDE2LjI4NTMgMTYuOTYyNCAxNi4yODUzIDE3Ljc2MDFWMjAuMzQ1MkMxNi4yODUzIDIxLjE0MjkgMTYuOTMwNCAyMS43ODk1IDE3LjcyNjEgMjEuNzg5NUgyMC4zMDQ5QzIxLjEwMDYgMjEuNzg5NSAyMS43NDU3IDIxLjE0MjkgMjEuNzQ1NyAyMC4zNDUyVjE3Ljc2MDFDMjEuNzQ1NyAxNi45NjI0IDIxLjEwMDYgMTYuMzE1OCAyMC4zMDQ5IDE2LjMxNThaIiBmaWxsPSIjMkQyRDJEIi8+CjxwYXRoIGQ9Ik0xNC42MDUyIDExLjg5NDdDMTQuNjA1MiAxMy40MDYzIDEzLjM4MjggMTQuNjMxNiAxMS44NzUgMTQuNjMxNkMxMC4zNjcxIDE0LjYzMTYgOS4xNDQ3NSAxMy40MDYzIDkuMTQ0NzUgMTEuODk0N0M5LjE0NDc1IDEwLjM4MzIgMTAuMzY3MSA5LjE1NzkgMTEuODc1IDkuMTU3OUMxMy4zODI4IDkuMTU3OSAxNC42MDUyIDEwLjM4MzIgMTQuNjA1MiAxMS44OTQ3WiIgZmlsbD0iIzJEMkQyRCIvPgo8cGF0aCBkPSJNMTMuNTM5NiAxNi4zNzIySDExLjI4NDVDMTAuMzQ2NiAxNi4zMjI2IDkuNDU0MDYgMTUuOTUyMSA4Ljc1NTggMTUuMzIyNEw4LjY2MTQ2IDE1LjIzNzJDOC4wMzEyOSAxNC41MzExIDcuNjYxNjYgMTMuNjI5NyA3LjYxNDExIDEyLjY4MzVWMTAuNDEzNUM3LjYwOTQ1IDEwLjAzMSA3LjQ1NzczIDkuNjY1MDMgNy4xOTA1NSA5LjM5MTg5QzYuOTIzMzcgOS4xMTg4IDYuNTYxMzQgOC45NTk1NiA2LjE3OTkxIDguOTQ3MzlIMy40ODEzN0MzLjA4ODQ3IDguOTQ3MzkgMi43MTE3IDkuMTAzODUgMi40MzM4OSA5LjM4MjM0QzIuMTU2MDggOS42NjA4MiAyIDEwLjAzODUgMiAxMC40MzI0VjEzLjA5MDJDMiAxMy40ODQgMi4xNTYwOCAxMy44NjE3IDIuNDMzODkgMTQuMTQwMkMyLjcxMTcgMTQuNDE4NyAzLjA4ODQ3IDE0LjU3NTEgMy40ODEzNyAxNC41NzUxSDUuNzQ1ODlDNi42ODI5NCAxNC42Mjg1IDcuNTc0MzMgMTQuOTk4NiA4LjI3NDYxIDE1LjYyNUw4LjM1OTU0IDE1LjcxOTZDOC45ODc3IDE2LjQxOTYgOS4zNTczNyAxNy4zMTQzIDkuNDA2ODUgMTguMjU0NVYyMC41MTVDOS40MDY4NSAyMC43MTA4IDkuNDQ1NDkgMjAuOTA0NyA5LjUyMDUxIDIxLjA4NTRDOS41OTU1NyAyMS4yNjYyIDkuNzA1NTMgMjEuNDMwNCA5Ljg0NDEgMjEuNTY4NEM5Ljk4MjYzIDIxLjcwNjQgMTAuMTQ3MSAyMS44MTU2IDEwLjMyNzkgMjEuODg5N0MxMC41MDg3IDIxLjk2MzcgMTAuNzAyNCAyMi4wMDEyIDEwLjg5NzcgMjJIMTMuNTM5NkMxMy45MzI1IDIyIDE0LjMwOTMgMjEuODQzNiAxNC41ODcxIDIxLjU2NTFDMTQuODY0OSAyMS4yODY2IDE1LjAyMSAyMC45MDg5IDE1LjAyMSAyMC41MTVWMTcuODU3MkMxNS4wMjEgMTcuNDYzNCAxNC44NjQ5IDE3LjA4NTcgMTQuNTg3MSAxNi44MDcyQzE0LjMwOTMgMTYuNTI4NyAxMy45MzI1IDE2LjM3MjIgMTMuNTM5NiAxNi4zNzIyWiIgZmlsbD0iIzJEMkQyRCIvPgo8cGF0aCBkPSJNMjAuNTE4NiA5LjYwM0gxOC4yNjM1QzE3LjMyNTYgOS41NTMzNiAxNi40MzMgOS4xODI4MyAxNS43MzQ4IDguNTUzMTVMMTUuNjQwNCA4LjQ2ODAxQzE1LjAxMDMgNy43NjE4NyAxNC42NDA2IDYuODYwNTIgMTQuNTkzMSA1LjkxNDI0VjMuNjQ0MjJDMTQuNTg4NCAzLjI2MTc0IDE0LjQzNjcgMi44OTU4IDE0LjE2OTUgMi42MjI2N0MxMy45MDI0IDIuMzQ5NTcgMTMuNTQwMyAyLjE5MDMzIDEzLjE1ODkgMi4xNzgxNkgxMC40NjA0QzEwLjA2NzUgMi4xNzgxNiA5LjY5MDY5IDIuMzM0NjMgOS40MTI4OCAyLjYxMzExQzkuMTM1MDcgMi44OTE1OSA4Ljk3ODk5IDMuMjY5MjggOC45Nzg5OSAzLjY2MzEzVjYuMzIwOTRDOC45Nzg5OSA2LjcxNDc5IDkuMTM1MDcgNy4wOTI0OCA5LjQxMjg4IDcuMzcxQzkuNjkwNjkgNy42NDk0OSAxMC4wNjc1IDcuODA1OTEgMTAuNDYwNCA3LjgwNTkxSDEyLjcyNDlDMTMuNjYxOSA3Ljg1OTMgMTQuNTUzMyA4LjIyOTM2IDE1LjI1MzYgOC44NTU4TDE1LjMzODUgOC45NTAzN0MxNS45NjY3IDkuNjUwMzMgMTYuMzM2NCAxMC41NDUxIDE2LjM4NTggMTEuNDg1MlYxMy43NDU4QzE2LjM4NTggMTMuOTQxNiAxNi40MjQ1IDE0LjEzNTUgMTYuNDk5NSAxNC4zMTYyQzE2LjU3NDYgMTQuNDk3IDE2LjY4NDUgMTQuNjYxMSAxNi44MjMxIDE0Ljc5OTJDMTYuOTYxNiAxNC45MzcyIDE3LjEyNjEgMTUuMDQ2NCAxNy4zMDY5IDE1LjEyMDRDMTcuNDg3NyAxNS4xOTQ1IDE3LjY4MTMgMTUuMjMyIDE3Ljg3NjcgMTUuMjMwN0gyMC41MTg2QzIwLjkxMTUgMTUuMjMwNyAyMS4yODgzIDE1LjA3NDMgMjEuNTY2MSAxNC43OTU4QzIxLjg0MzkgMTQuNTE3NCAyMiAxNC4xMzk2IDIyIDEzLjc0NThWMTEuMDg4QzIyIDEwLjY5NDIgMjEuODQzOSAxMC4zMTY0IDIxLjU2NjEgMTAuMDM3OUMyMS4yODgzIDkuNzU5NDcgMjAuOTExNSA5LjYwMyAyMC41MTg2IDkuNjAzWiIgZmlsbD0iIzJEMkQyRCIvPgo8L3N2Zz4K';
}