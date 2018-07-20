import { SectionCheckpoint } from "./sectionCheckpoint.model";

export class Section {
  public sectionId: number | null = null;
  public slideId: number | null = null;
  public name: string | null = null;
  public number: number | null = null;
  public createdAt: string | null = null;
  public modifiedAt: Date | null = null;
  public checkpoints: SectionCheckpoint[] | null = null;
  [key: string]: string | null | number | Date | SectionCheckpoint[];

  constructor(obj: SectionI) {
    Object.keys(obj).forEach((o) => {
      if (Array.isArray(o)) {
        this[o] = obj && (<Array<any>>obj[o]).map((sc: SectionCheckpoint) => new SectionCheckpoint(sc)) || [];
      } else {
        this[o] = obj && obj[o] || null;
      }
    })
  }

}

interface SectionI {
  sectionId: number;
  slideId: number;
  name: string;
  number: number;
  createdAt: string;
  modifiedAt: Date;
  checkpoints: SectionCheckpoint[];
  [key: string]: string | null | number | Date | SectionCheckpoint[];
}
