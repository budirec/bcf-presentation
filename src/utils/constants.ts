export const keyCodes: KeyCodes = Object.freeze({
  up: 38,
  right: 39,
  down: 40,
  left: 37,
});

export interface KeyCodes {
  up: number;
  right: number;
  down: number;
  left: number;
}

// Data model
export class Slide {
  public slideId: number;
  public name: string;
  public createdAt: Date;
  public modifiedAt: Date;

  constructor(obj: any) {
    this.slideId = obj && obj.slideId || null;
    this.name = obj && obj.name || null;
    this.createdAt = obj && obj.createdAt || null;
    this.modifiedAt = obj && obj.modifiedAt || null;
  }
}

export class Section {
  public sectionId: number;
  public slideId: number;
  public name: string;
  public number: number;
  public createdAt: string;
  public modifiedAt: Date;
  public checkpoints: Array<SectionCheckpoint>;

  constructor(obj: any) {
    this.sectionId = obj && obj.sectionId || null;
    this.slideId = obj && obj.slideId || null;
    this.name = obj && obj.name || null;
    this.number = obj && obj.number || null;
    this.createdAt = obj && obj.createdAt || null;
    this.modifiedAt = obj && obj.modifiedAt || null;
    this.checkpoints = obj && obj.checkpoints.map((c: SectionCheckpoint) => new SectionCheckpoint(c)) || null;
  }

}

export class SectionCheckpoint {
  public checkpointId: number;
  public sectionId: number;
  public name: string;
  public number: number;
  public createdAt: string;
  public modifiedAt: Date;
  public pages: Array<any>;

  constructor(obj: any) {
    this.checkpointId = obj && obj.checkpointId || null;
    this.sectionId = obj && obj.sectionId || null;
    this.name = obj && obj.name || null;
    this.number = obj && obj.number || null;
    this.createdAt = obj && obj.createdAt || null;
    this.modifiedAt = obj && obj.modifiedAt || null;
    this.pages = obj && obj.pages || null;
  }
}
